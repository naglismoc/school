


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center"><h3>{{$schoolClass->grade}} {{$schoolClass->letter}} klasė</h3></div>
        </div>
           <div class="card">
               <div class="card-header"><b>Mokytojų sąrašas</b></div>


               <form action="{{route('schoolClass.add',[$schoolClass])}}" method="post">
                @csrf
              <select name="teacher" id="">
                @foreach ($teachers as $teacher)
                    
                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                @endforeach
              </select>
              <button type="submit">add</button>
              </form>





               <div class="card-body">
                 <table class="table">
                   <tr>
                     <th>Vardas</th>
                     <th>Pavardė</th>
                     <th>Pamoka</th>
                     <th>edit</th>
                     <th>delete</th>
                   </tr>
                  @foreach ($schoolClass->teachers as $teacher)
                    <tr>
                      <td>{!!$teacher->name!!}</td>
                      <td>{!!$teacher->surname!!}</td>
                      <td>{!!$teacher->subject!!}</td>
                      <td><a  href="{{route('schoolClass.edit',[$schoolClass])}}" >
                            <button  class="btn btn-primary" disabled>edit</button> 
                          </a>
                      </td>
                      <td>
                        <form method="POST" action="{{route('schoolClass.destroy', $schoolClass)}}">
                          @csrf
                          <button class="btn btn-danger" type="submit" disabled>DELETE</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
              </table>
               </div>
           </div>
           


           <div class="card">
            <div class="card-header"><b>Mokinių sąrašas</b></div>

            <div class="card-body">
              <table class="table">
                <tr>
                  <th>Vardas</th>
                  <th>Pavardė</th>
                  <th>Pamoka</th>
                  <th>edit</th>
                  <th>delete</th>
                </tr>
               @foreach ($schoolClass->students as $student)
                 <tr>
                   <td>{!!$student->name!!}</td>
                   <td>{!!$student->surname!!}</td>
                   {{-- <td>{!!$teacher->subject!!}</td> --}}
                   <td><a  href="{{route('schoolClass.edit',[$schoolClass])}}" >
                         <button  class="btn btn-primary" disabled>edit</button> 
                       </a>
                   </td>
                   <td>
                     <form method="POST" action="{{route('schoolClass.destroy', $schoolClass)}}">
                       @csrf
                       <button class="btn btn-danger" type="submit" disabled>DELETE</button>
                     </form>
                   </td>
                 </tr>
               @endforeach
           </table>
            </div>



        </div>
       </div>
   </div>
</div>
@endsection
