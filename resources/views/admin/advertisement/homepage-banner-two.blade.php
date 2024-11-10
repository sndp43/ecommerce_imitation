<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.homepage-banner-secion-two')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="odd">
                    <h5>banner one</h5>
                    <div class="form-group">
                        <label>Banner title category</label>
                        <input type="text" class="form-control" name="banner_one_category" value="{{@$homepage_secion_banner_two->banner_one->banner_category}}">
                    </div>
                    <div class="form-group">
                        <label>Banner Title</label>
                        <input type="text" class="form-control" name="banner_one_title" value="{{@$homepage_secion_banner_two->banner_one->banner_title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <br>
                        <label class="custom-switch mt-2">
                            <input type="checkbox" {{@$homepage_secion_banner_two->banner_one->status == 1 ? 'checked':''}} name="banner_one_status" class="custom-switch-input" >
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <img src="{{asset(@$homepage_secion_banner_two->banner_one->banner_image)}}" alt="" width="150px">
                    </div>
                    <div class="form-group">

                        <label>Banner Image</label>
                        <input type="file" class="form-control" name="banner_one_image" value="">
                        <input type="hidden" class="form-control" name="banner_one_old_image" value="{{@$homepage_secion_banner_two->banner_one->banner_image}}">
                    </div>
                    <div class="form-group">
                        <label>Banner url</label>
                        <input type="text" class="form-control" name="banner_one_url" value="{{@$homepage_secion_banner_two->banner_one->banner_url}}">
                    </div>
                    <div class="form-group">
                        <label>Banner url text</label>
                        <input type="text" class="form-control" name="banner_one_url_text" value="{{@$homepage_secion_banner_two->banner_one->banner_url_text}}">
                    </div>
                </div>
                <hr>
                <div class="even">
                    <h5>banner two</h5>
                    <div class="form-group">
                        <label>Banner title category</label>
                        <input type="text" class="form-control" name="banner_two_category" value="{{@$homepage_secion_banner_two->banner_two->banner_category}}">
                    </div>
                    <div class="form-group">
                        <label>Banner Title</label>
                        <input type="text" class="form-control" name="banner_two_title" value="{{@$homepage_secion_banner_two->banner_two->banner_title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <br>
                        <label class="custom-switch mt-2">
                            <input type="checkbox" {{@$homepage_secion_banner_two->banner_two->status == 1 ? 'checked':''}} name="banner_two_status" class="custom-switch-input" >
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <img src="{{asset(@$homepage_secion_banner_two->banner_two->banner_image)}}" alt="" width="150px">
                    </div>
                    <div class="form-group">

                        <label>Banner Image</label>
                        <input type="file" class="form-control" name="banner_two_image" value="">
                        <input type="hidden" class="form-control" name="banner_two_old_image" value="{{@$homepage_secion_banner_two->banner_two->banner_image}}">
                    </div>
                    <div class="form-group">
                        <label>Banner url</label>
                        <input type="text" class="form-control" name="banner_two_url" value="{{@$homepage_secion_banner_two->banner_two->banner_url}}">
                    </div>
                    <div class="form-group">
                        <label>Banner url</label>
                        <input type="text" class="form-control" name="banner_two_url_text" value="{{@$homepage_secion_banner_two->banner_two->banner_url_text}}">
                    </div>
                </div>
                <div class="odd">
                    <h5>banner three</h5>
                    <div class="form-group">
                        <label>Banner title category</label>
                        <input type="text" class="form-control" name="banner_three_category" value="{{@$homepage_secion_banner_two->banner_three->banner_category}}">
                    </div>
                    <div class="form-group">
                        <label>Banner Title</label>
                        <input type="text" class="form-control" name="banner_three_title" value="{{@$homepage_secion_banner_two->banner_three->banner_title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <br>
                        <label class="custom-switch mt-2">
                            <input type="checkbox" {{@$homepage_secion_banner_two->banner_three->status == 1 ? 'checked':''}} name="banner_three_status" class="custom-switch-input" >
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <img src="{{asset(@$homepage_secion_banner_two->banner_three->banner_image)}}" alt="" width="150px">
                    </div>
                    <div class="form-group">

                        <label>Banner Image</label>
                        <input type="file" class="form-control" name="banner_three_image" value="">
                        <input type="hidden" class="form-control" name="banner_three_old_image" value="{{@$homepage_secion_banner_two->banner_three->banner_image}}">
                    </div>
                    <div class="form-group">
                        <label>Banner url</label>
                        <input type="text" class="form-control" name="banner_three_url" value="{{@$homepage_secion_banner_two->banner_three->banner_url}}">
                    </div>
                    <div class="form-group">
                        <label>Banner url</label>
                        <input type="text" class="form-control" name="banner_three_url_text" value="{{@$homepage_secion_banner_two->banner_three->banner_url_text}}">
                    </div>
                </div>
                <div class="even">
                    <h5>banner four</h5>
                    <div class="form-group">
                        <label>Banner title category</label>
                        <input type="text" class="form-control" name="banner_four_category" value="{{@$homepage_secion_banner_two->banner_four->banner_category}}">
                    </div>
                    <div class="form-group">
                        <label>Banner Title</label>
                        <input type="text" class="form-control" name="banner_four_title" value="{{@$homepage_secion_banner_two->banner_four->banner_title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <br>
                        <label class="custom-switch mt-2">
                            <input type="checkbox" {{@$homepage_secion_banner_two->banner_four->status == 1 ? 'checked':''}} name="banner_four_status" class="custom-switch-input" >
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <img src="{{asset(@$homepage_secion_banner_two->banner_four->banner_image)}}" alt="" width="150px">
                    </div>
                    <div class="form-group">

                        <label>Banner Image</label>
                        <input type="file" class="form-control" name="banner_four_image" value="">
                        <input type="hidden" class="form-control" name="banner_four_old_image" value="{{@$homepage_secion_banner_two->banner_four->banner_image}}">
                    </div>
                    <div class="form-group">
                        <label>Banner url</label>
                        <input type="text" class="form-control" name="banner_four_url" value="{{@$homepage_secion_banner_two->banner_four->banner_url}}">
                    </div>
                    <div class="form-group">
                        <label>Banner url</label>
                        <input type="text" class="form-control" name="banner_four_url_text" value="{{@$homepage_secion_banner_two->banner_four->banner_url_text}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
