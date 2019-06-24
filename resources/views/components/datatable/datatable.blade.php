<!--Table-->
<table class="table table-hover mb-0" id="{{$id}}">

    <!--Table head-->
    <thead>
        <tr>
            @if($checkbox == 'enabled')
                <th>
                    <input id="checkbox" type="checkbox">
                    <label for="checkbox" class="mr-2 label-table"></label>
                </th>
            @endif

            @foreach($thead['title'] as $title)
                <th class="{{ $thead['class'] }}"><a href="">{{$title}} {!!$thead['icons']!!} </a></th>
            @endforeach

{{-- <th class="th-lg"><a></a></th> --}}

        </tr>
    </thead>
    <!--Table head-->

</table>
<!--Table-->