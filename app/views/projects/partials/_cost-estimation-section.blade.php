<table class="table table-invoice">
    <tbody>
        @if(count($costEstimates) > 0)
            <tr>
                <td colspan="3">Please Select One</td>
            </tr>
        @endif
        @foreach($costEstimates as $costMultiplier => $cost)
            <tr>
                <td class="text-center">
                   <input type="radio" name="cost_multiplier" value="{{$costMultiplier}}">
                </td>
                <td>
                    <span class="pull-right">TOTAL COST X <b>{{$costMultiplier}}</b> + SC + VAT</span>
                </td>
                <td>
                    <span class="pull-right"><b>PHP <span class="generated-cost-amount">{{number_format($cost, 2)}}</span></b></span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>