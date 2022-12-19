@extends('layouts.app')

@section('content')
    <div class="m-auto p-lg-5">

        @if($id == null)
            <div class="alert alert-danger">
                <ul>
                   <p>
                       No Any Process
                   </p>
                </ul>
            </div>
        @else
            <div class="card">
                <div class="card-header">
                    Importing Data
                </div>
                <div class="card-body">
                    <h5 class="card-title">Progress</h5>
                    <p class="card-text">
                        <b id="pro">
                            0%
                        </b>
                    </p>

                    <div class="progress">
                        <div id="progressbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                    </div>

                </div>
            </div>

            <script>


                let x = 0;
                setInterval(displayHello, 1000);

                function displayHello() {
                    if (document.getElementById("progressbar").style.width ==="100%"){
                        width = parseInt("Complete");
                    }else{
                        $.get("{{route("view.batch")}}?id={{$id}}", function(data, status){
                            // alert("Data: " + data + "\nStatus: " + status);
                            // console.log(data);
                            console.log(data.progress);
                            let width = document.getElementById("progressbar").style.width.replace("%", "");
                            width = parseInt(data.progress);
                            width = width +"%";
                            document.getElementById("progressbar").style.width = width;
                            document.getElementById("pro").innerHTML = data.progress;
                            document.getElementById("pro").innerHTML += "%";
                        });
                    }



                }
            </script>

        @endif


    </div>

@endsection

