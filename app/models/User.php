<?php

use Acme\Activation\Events\UserHasActivated;
use Acme\Registration\Events\UserHasRegistered;
use Acme\Users\UserHelper;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

/**
 * Class User
 */
class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

    /** fillable fields prevent mass assignment exception
     * @var array
     */
    protected $fillable = ['role_id', 'username', 'password', 'email', 'last_login', 'recstat'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
     * Path to the presenter for a user.
     *
     * @var string
     */
    protected $presenter = 'Acme\Presenters\UserPresenter';

    /**
     * Register a user
     *
     * @param $role_id
     * @param $email
     * @return static
     */
    public static function register($role_id, $email)
    {
        $user = new static(compact('role_id', 'email'));

        self::prepareUserInformation($email, $user);

        $user->raise(new UserHasRegistered($user));

        return $user;
    }

    /**
     * @param $email
     * @param $user
     */
    protected static function prepareUserInformation($email, $user)
    {
        $username = UserHelper::generateUsernameByEmail($email);
        $activationCode = UserHelper::generateUserActivationCode();

        $user->username = $username;

        $user->password = $activationCode;

        $user->activation_code = $activationCode;
    }

    /**
     * Activate User
     *
     * @param $username
     * @param $password
     * @param $activation_code
     * @return static
     */
    public static function activate($username, $password, $activation_code)
    {
        $user = User::whereActivationCode($activation_code)->first();

        $user->username = $username;

        $user->password = $password;

        $user->activation_code = null;

        $user->recstat = 'A';

        $user->raise(new UserHasActivated($user));

        return $user;
    }

    public static function resendActivationEmail( $userId)
    {
        $user = self::findOrFail($userId);

        $user->raise(new UserHasRegistered($user));

        return $user;
    }

    public static function deactivate( $userId)
    {
        $user = self::findOrFail($userId);

        $user->recstat = 'I';

        return $user;
    }

    public static function reactivate( $userId)
    {
        $user = self::findOrFail($userId);

        $user->recstat = 'A';

        return $user;
    }

    public static function changePassword( $user, $new_password)
    {
        $user->password = $new_password;

        return $user;
    }

    /**
     * Passwords must always be hashed.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function updateLastLoginDate()
    {
        $this->last_login = UserHelper::getCurrentDateForDB();

        $this->save();
    }

    public function role()
    {
        return $this->belongsTo('Role');
    }



}
