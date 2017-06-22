@include('admin.include.header')

<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="b">
        <div class="row">
          <h2 class="ui block header">News</h2>
          
            <div class="container pull-left">
                <a href="{{route('news.create')}}" class="ui button teal">Create</a>
            </div>
        </div>
<table class="table">
  <thead>
    <tr>
      <th>image</th>
      <th>News Title</th>
      <th>Date</th>
      <th>Short Description</th>
      <th>Description</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    @foreach($news as $value)
    <tr>
      <th><img style="width:120px;" src="{{asset('news/'.$value->image)}}"></th>
      <td>{{$value->title}}</td>
      <td>{{$value->created_date}}</td>
      <td>{{$value->short_desc}}</td>
      <td>{{$value->description}}</td>
      <td>
        <form action="{{route('news.destroy',$value->id)}}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <a href="{{route('news.edit',$value->id)}}" class="ui tiny button blue">Edit</a>
            <button class="ui tiny button red" onclick="return confirm_submit()">Delete</button>
        </form>
      </td>

    </tr>
 @endforeach
  </tbody>
</table>
</div>
</section>

@include('admin.include.footer')