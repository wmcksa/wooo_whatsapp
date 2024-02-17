<div>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <div class="grey-bg container-fluid">
      <section id="minimal-statistics">
        <div class="row">

        </div>

        <div class="row">
            @if ($user->subscrip == null)


            @foreach ($packages as $package )
          <div class="col-xl-3 col-sm-6 col-12">
            {{-- <a  wire:click="subscrip({{ $package->id }})"> --}}
<a href="{{ route("paymentMoyasar",['amount'=>$package->price, 'id'=>$package->id]) }}">
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
              <small class="col-6 col-sm-6 col-md-4">
                <div class="card custom-card">
                  <div class="img-container">
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

    <br><br><br><br><br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


</div>
