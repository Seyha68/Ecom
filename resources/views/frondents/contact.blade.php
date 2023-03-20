<link href="{{ asset('asset/css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
<div class="container cont m-t-5">
    <center><h1>Contact US</h1></center>
    <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class=" col-md-12 mb-3">
                <label> Youre Name</label>
                <input type="text" name="cont_name" class="form-control">
                @error('cont_name') <span class="text-danger">{{ $message }}</span>

                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-12 mb-3">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control">
                @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-12 mb-3">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control">
                @error('subject') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-6 mb-3">
                <label>Message</label>
                <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>
                @error('message') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
  </div>
