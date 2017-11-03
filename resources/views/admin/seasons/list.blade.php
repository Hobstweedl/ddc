<table class="table is-narrow is-striped" id="seasonTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Publically Display?</th>
            <th>Type</th>
            <th>Prorate?</th>
            <th>Charge for Holidays?</th>
            <th>Charge Reg. Fee?</th>
            <th>Order</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($seasons as $season)
            <tr>
                <th>{{$season->Name}}</th>
                <td>{{ \Carbon\Carbon::parse($season->StartDate)->format('m/d/Y')}}</td>
                <td>{{ \Carbon\Carbon::parse($season->EndDate)->format('m/d/Y')}}</td>
                <td>@if ($season->Viewable == 1) Yes @else No @endif</td>
                <td>@if ($season->SeasonType == 1) Weekly Series @else Date Specific @endif</td>
                <td>@if ($season->ProrateOnEnrollment == 1) Yes @else No @endif</td>
                <td>@if ($season->ChargeForHolidays == 1) Yes @else No @endif</td>
                <td>@if ($season->ChargeRegistrationFee == 1) Yes @else No @endif</td>
                <td>{{$season->Order}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function(){
      $("#seasonTable").sortable({
        stop: function(){
          $.map($(this).find('tr'), function(el) {
            var itemID = el.id;
            var itemIndex = $(el).index();
            $.ajax({
              url:'{{URL::to("order-table")}}',
              type:'GET',
              dataType:'json',
              data: {itemID:itemID, itemIndex: itemIndex},
            })
          });
        }
      });
    });
  </script>