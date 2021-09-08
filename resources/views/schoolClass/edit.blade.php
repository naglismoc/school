

 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Klasės redagavimas</div>

               <div class="card-body">
                <form method="POST" action="{{route('schoolClass.update',$schoolClass)}}">

                    <div class="form-group">
                        <label>Klasė</label>
                        <input type="text" name="grade"  class="form-control" value="{{$schoolClass->grade}}">
                        {{-- <small class="form-text text-muted">Autoriaus vardas.</small> --}}
                    </div>
                    <div class="form-group">
                        <label>Raidė</label>
                        <input type="text" name="letter"  class="form-control" value="{{$schoolClass->letter}}">
                        {{-- <small class="form-text text-muted">Autoriaus pavardė.</small> --}}
                    </div>
                    @csrf
                    <button class="btn btn-success" type="submit">update</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
