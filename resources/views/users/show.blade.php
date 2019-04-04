@extends('layout.admin')
@section('content')
    <label for="name">Name: </label>
    <p>{{ $user->name }}</p>
    <label for="name">Email: </label>
    <p>{{ $user->email }}</p>
    <h3>Trainings</h3>
    <!-- Trainings -->
    <table class="table table-striped table-sm">
        <thead>
          <tr class="thead-dark">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Completion Date</th>
          </tr>
        </thead>
        <tbody>
        <?php     $ko = $ok = 0; ?>
            @foreach($user->trainings as $training)
              <?php 
              
          
              if($training->pivot->status == 0)
                $ko+=1;
              else
                $ok+=1; 
              
              ?> 
            <tr>
              <th scope="row">{{ $training->id }}</th>
              <td>{{ $training->name }}</a></td>
              <td class="{{ ($training->pivot->status == 0 ) ? 'bg-warning' : 'bg-success' }}">{{ config('app.training_user_statuses.'.$training->pivot->status) }}</td>
              <td>{{ $training->pivot->completion_date }}</td>
            </tr>

          @endforeach
        </tbody>
      </table>
      Uncompleted: {{ $ko }} - Completed: {{ $ok }}
@endsection