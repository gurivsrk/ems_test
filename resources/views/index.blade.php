<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EMS</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link href="{{asset('assets/style.css')}}" rel="stylesheet">
    </head>
    <body>
    <section id="head">
        <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
            <div class="container-fluid px-5">
              <a class="navbar-brand" href="#">EMS</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </section>
    @if($errors && sizeof($errors) > 0)
        <div class="alert alert-danger my-4" role="alert ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
    @endif
    @if(session('message'))
        <div class="alert alert-danger my-4" role="alert ">
            {{session('message')}}
        </div>
    @endif
    <section id="emsBody" class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form id="ems_form" class="row g-3" action="{{route('processForm.store')}}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label for="event_name" class="form-label">Event Name:</label>
                            <input type="text" class="form-control" name="event_name" id="event_name" placeholder="Event name" required>
                                <div class="valid-feedback"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="organizer" class="form-label">Organizer</label>
                            <input type="text" class="form-control" id="organizer" name="organizer" placeholder="Event Organizer" required>
                                <div class="valid-feedback"></div>
                        </div>  
                        <div class="col-md-6">
                            <label for="event_start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="event_start_date" required>
                                <div class="valid-feedback"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="event_end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="event_end_date" name="end_date" required>
                                <div class="valid-feedback"></div>
                        </div>
                        <div class="col-md-12">
                            <label for="event_description" class="form-label">Event Description:</label>
                            <textarea type="text"  rows="5" class="form-control" id="event_description"  placeholder="Event Description" name="event_description"  required></textarea>
                                <div class="valid-feedback"></div>
                        </div>               
                        <div class="col-12">
                            <span  id="addTicket" class="btn btn-primary"> Add New Ticket </span>
                        </div>
                        <div id="dynamicTickets"></div>
                        <div class="col-12">
                            <button id="submit" class="btn btn-success" type="submit"> Save Event </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    
        <!---- js ------>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="{{asset('assets/main.js')}}"></script>
        <x-j-query />
    </body>
</html>
