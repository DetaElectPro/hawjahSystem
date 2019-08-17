<style>
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropbtn:hover, .dropbtn:focus {
        background-color: #3e8e41;
    }

    #myInput {
        box-sizing: border-box;
        /*background-image: url('searchicon.png');*/
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    #myInput:focus {
        outline: 3px solid #ddd;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f6f6f6;
        min-width: 230px;
        overflow: auto;
        border: 1px solid #ddd;
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }
</style>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-group col col-md-6 has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name">
        <span class="glyphicon glyphicon-earname form-control-feedback"></span>
        @if ($errors->has('name'))
            <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>


    <div class="dropdown">
{{--        <button onclick="myFunction()" class="dropbtn">Dropdown</button>--}}
        <div class="dropdown-content">
            <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">

            @foreach($field as $item)
                <a href="#{{$item->name}}">{{$item->name}}</a>
            @endforeach
        </div>
    </div>


    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('medicalSpecialties.index') !!}" class="btn btn-default">Cancel</a>
</div>


<script>


    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>
