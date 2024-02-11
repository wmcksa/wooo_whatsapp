<div>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <div class="grey-bg container-fluid">
      <section id="minimal-statistics">
        <div class="row">

        </div>

        <div class="row">
            @if ($user->subscrip == null)


            @foreach ($packages as $package )
          <div class="col-xl-3 col-sm-6 col-12">
            <a  wire:click="subscrip({{ $package->id }})">

            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      <i class="icon-pencil primary font-large-2 float-left"></i>
                    </div>
                    <div class="media-body text-right">
                      <h3>{{ $package->price  }}</h3>
                      <span>{{ $package->name  }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </a>

          </div>
          @endforeach

          @else
          <div class="container mt-3 text-center">

            <div class="row">
              <div class="col-md-12 text-center mb-2">
                <h4>
              انت بالفعل مشترك في
                </h4>
                <hr class="w-75">
              </div>
            </div>

            <div class="row justify-content-center">
              <small class="col-12 col-sm-6 col-md-4">
                <div class="card custom-card">
                  <div class="img-container">
                    <img src="https://cdn.pixabay.com/photo/2016/11/29/12/13/fence-1869401_960_720.jpg"/>
                  </div>
                  <div class="custom-card-body">
                    <h4 class="card-title">
                        {{ $userScbscrip->name}}
                    </h4>
                    <div class="category">
المتبقي من الايام                        {{ $dayOf}}

                    </div>
                    <div class="text text-overflow">
                        {{ $userScbscrip->description}}
                    </div>
                  </div>
                </div>
            </small>
            </div>
          </div>


          @endif

        </div>




      </section>


    </div>
</div>
