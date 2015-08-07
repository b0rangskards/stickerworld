/* STICKERWORLD CONSTANTS */

var GMAP = {
    coords: {
        lat: 10.30739,
        lng: 123.89728
    },
    zoom: 8,
    minZoom: 17
};

function ucwords(str) {
    return (str + '')
        .replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function ($1) {
            return $1.toUpperCase();
        });
}