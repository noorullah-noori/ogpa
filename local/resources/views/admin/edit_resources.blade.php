@include('admin.include.header')

<style>
    .file {
      visibility: hidden;
      position: absolute;
    }


</style>

<!--main content start-->
<section id="main-content">
<section class="wrapper">
        <div class="col-md-11">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Resources
                        </header>
                        <div class="panel-body">
                        <div class="form cmxform form-horizontal ">
                            {!! Form::model($resources, ['route' => array('resources.update',$resources->id)]) !!}
                            <input name="_method" type="hidden" value="PATCH">
                                <div class="form-group ">
                                        <label for="title" class="control-label col-lg-3">Title</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="title" name="title" value="{{$resources->title}}" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="description" class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" value="{{$resources->description}}" id="description" name="description" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="pdf" class="file">
                                        <div class="input-group col-md-6 col-md-offset-3 col-xs-12" style="padding-left:15px; padding-right:14px;">
                                          <span class="input-group-addon"><i class="fa fa-file-pdf-o"></i></span>
                                          <input type="text" class="form-control input-lg" disabled placeholder="{{$resources->pdf}}">
                                          <span class="input-group-btn">
                                            <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-folder-open"></i> Browse</button>
                                          </span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="type" class="control-label col-lg-3">Type</label>
                                        <div class="col-lg-6">
                                            <div class="ui label teal" style="margin-bottom:2px;">{{$resources->type}}</div>
                                            <select class="form-control" id="type" name="type">
                                            <option value="self_assessent_reports">Self-Assessment Reports</option>
                                            <option value="irm_reports">IRM Reports</option>
                                            <option value="consultation_reports">Consultation Papers</option>
                                            <option value="national_action_plans">National Action Plans</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                            <a href="{{url()->previous()}}" class="btn btn-default"  type="button">Cancel</a>
                                        </div>
                                    </div>
                            {!! Form::close() !!}
                        </div>
                        </div>
                    </section>
        </div>

</section>

<script>
    $(document).on('click', '.browse', function(){
      var file = $(this).parent().parent().parent().find('.file');
      file.trigger('click');
    });
    $(document).on('change', '.file', function(){
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
</script>

@include('admin.include.footer')