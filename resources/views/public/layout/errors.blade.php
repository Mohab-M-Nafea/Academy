@if($errors->any())

    <div class="alert alert-danger col-11 mx-auto">
        <div class="row">
            <div class="col-1 my-auto">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="col-10">
                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ ucwords($error) }}</li>

                    @endforeach

                </ul>
            </div>
        </div>
    </div>

@endif
