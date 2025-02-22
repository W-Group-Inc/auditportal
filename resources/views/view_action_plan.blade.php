<div class="modal fade" id="view{{$action_plan->id}}" tabindex="-1" aria-labelledby="addIncome" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Action Plan <label class='label label-danger'></span></h5>
                    </div>
                    <form method='post' action='{{url('save-action-plan/'.$action_plan->id)}}' onsubmit='show();' class="form-horizontal"  enctype="multipart/form-data" >
                    <div class="modal-body">             
                        @csrf
                        <div class='row'>
                            <div class="col-md-12">
                                Proof: 
                                @if(is_null($action_plan->attachment) && (!$action_plan->files || $action_plan->files->isEmpty()))
                                    <span class="text-danger">No Proof</span>
                                @else
                                    @if($action_plan->attachment)
                                        <a href="{{ url($action_plan->attachment) }}" target="_blank">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                    @endif
                                    @if($action_plan->files && $action_plan->files->isNotEmpty())
                                        @foreach($action_plan->files as $file)
                                            <a href="{{ url($file->attachment) }}" target="_blank">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-12'>
                                Upload Proof :
                                <!-- <input name='file' class='form-control form-control-sm' type='file' required> -->
                                <input name='file[]' class='form-control form-control-sm' type='file' multiple accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-12'>
                                Remarks:
                                <textarea name='remarks' class='form-control form-control-sm' required></textarea>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-12'>
                                Date Completed :
                                <input name='date_completed' value='{{$action_plan->date_completed}}' min='{{date("Y-m-d")}}' class='form-control form-control-sm' type='date' required>
                            </div>
                        </div>
                    </div> 
                    <div class="modal-footer">
                        <button type='submit'  class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
            </div>
        </div>
</div>