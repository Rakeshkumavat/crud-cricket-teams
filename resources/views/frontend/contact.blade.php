@extends('frontend.layout.main')




@section('main-container')




<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact-us" class="contact-us">
      <div class="container">

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="mobile" data-rule="minlen:4" required>
                <div class="validate"></div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="address" rows="5" placeholder="Address" required></textarea>
                <div class="validate"></div>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Submit</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

 @endsection




 {{-- public function studentList(Request $request){
    $search = $request ['search'] ?? "";
    if($search != ""){
        $students =Collage::where('name', 'LIKE', "{$search}%")->get();
    }else{
        $students = Collage::all();
        if($request->ajax()){
            return view('student.student_list',compact('students','search'))->render();
        }
    }

    return view('student.student_list',compact('students','search'));
    // return response()->json(['list'=>$college]);
}

public function studentEdit($id){
    $student = Collage::find($id);
    return view('student.student_edit', compact('student'));
}
public function updateStudentData(Request $request ){

    $student = Collage::find($request->id);
    $request->validate([
        'name'=>'required',
        'short_code'=>'required',
        'image'=>'nullable|mimes:jpeg,jpg,png,bmp|max:2048|',
        'signature_image'=>'nullable|mimes:jpeg,jpg,png,bmp|max:2048|',
    ]);
    // $input = $request->all();

    if(isset($request->image)){
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('employees'),$imageName);
        $student->image = $imageName;
        }
    if(isset($request->signature_image)){
        $signatureImage = time().'.'.$request->signature_image->extension();
        $request->signature_image->move(public_path('employees'),$signatureImage);
        $student->signature_image = $signatureImage;
        }

    $student->name = $request->name;
    $student->short_code = $request->short_code;
    $student->save();
    return response()->json();
}


public function deleteStudentData($id){
    $response = array('status'=>false);
    if ($id) {
        $college = Collage::find($id);
        $college->delete();
        $response['status'] = true;
    }
    return response()->json($response);
}

public function activeInActive($id){
    $response = array('status'=>false);
    $college = Collage::find($id);
    if ($college){
        $college->status = $college->status == 1 ? 0 : 1;
        $college->save();
    }
    return response()->json($response);
} --}}
