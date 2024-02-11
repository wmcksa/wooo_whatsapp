@extends('layouts.public')

@section('content')
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <img src="{{asset('assets/img/hero-carousel/hero-carousel-3.png')}}" class="img-fluid animated">
      @if (session('lang') == 'ar')
      <h2>عزيزنا العميل<span></span></h2>
      <p>انضم الان وحول مؤسستك الى مؤسسة رقمية </p>
      <div class="btn-get-started scrollto">
          <a href="{{route('register')}}" class="buy-btn" target="blank" style="color:white;">إشترك الآن</a>
      </div>
      @else
      <h2>Dear customer<span></span></h2>
      <p>Join now and transform your organization into a digital organization</p>
      <div class="btn-get-started scrollto">
          <a href="{{route('register')}}" class="buy-btn" target="blank" style="color:white;">Join now</a>
      </div>
      @endif
    </div>
  </section>
<main id="main">
    @if (session('lang') == 'ar')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5">
            <div class="about-img">
              <img src="{{asset('assets/img/AboutDes.png')}}" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-7">
            <h3 class="pt-0 pt-lg-5">عن إيفكس :</h3>
              <div class="d-flex me-4">
                <h4 style="text-align: justify;text-justify: inter-word;">
                  نظام إيفكس نظام سهل و متطوير يتيح لك تحويل قائمة مطعمك إلى قائمة إلكترونية تستطيع تحديثها و التعديل عليها بكل سهولة ويسر , كما يمكن للعملاء عرض القائمة من مسح رمز كيو أر كود موجود على الطاولة الخاص بالعميل و إستعراضها و الطلب من خلال جوال العميل و متابعة تجهيز طلبك بكل سهولة ويسر
                </h4>
              </div>
              <div class="d-flex align-items-center me-4">
                <h4 style="text-align: justify;text-justify: inter-word;">
                  كما يمكنك متابعة وإدارة المبيعات وإصدار الفواتير الضريبية لجميع الفروع  
                </h4>
                <br><Br>
              </div>
              <div class="d-flex align-items-center me-4">
              </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
    @else
    <!-- ======= About Section ======= -->
    <section id="about" class="about" style="direction: ltr">
      <div class="container" data-aos="fade-up">
        <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5">
            <div class="about-img">
              <img src="{{asset('assets/img/AboutDes.png')}}" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-7">
            <h3 class="pt-0 pt-lg-5">About evix:</h3>
              <div class="d-flex me-4">
                <h4 style="text-align: justify;text-justify: inter-word;">
                  The IFX system is an easy and developed system that allows you to convert your restaurant menu into an electronic menu that you can update and modify with ease. Customers can also view the menu by scanning the QR code on the customer's table, reviewing it, ordering through the customer's mobile phone, and following up on processing Your order is easy
                </h4>
              </div>
              <div class="d-flex align-items-center me-4">
                <h4 style="text-align: justify;text-justify: inter-word;">
                  You can also follow up and manage sales and issue tax invoices for all branches 
                </h4>
                <br><Br>
              </div>
              <div class="d-flex align-items-center me-4">
              </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
    @endif

     
    <section id="clients" >
      <div class="container" data-aos="zoom-out">
        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="{{asset('assets/img/Newvat.jpg')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('assets/img/apple-pay-logo.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('assets/img/mada.png')}}" class="img-fluid" alt=""></div>
             <div class="swiper-slide"><img src="{{asset('assets/img/visa.png')}}" class="img-fluid" alt=""></div>
             <div class="swiper-slide"><img src="{{asset('assets/img/mastercard-logo.png')}}" class="img-fluid" alt=""></div>
             <div class="swiper-slide"><img src="{{asset('assets/img/taxLogo.svg')}}" class="img-fluid" alt=""></div>
          </div>
        </div>
      </div>
    </section>


    @if (session('lang') == 'ar')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>الخدمات</h2>
          <p>إيفكس يقدم لك خدمات و مميزات لك و لعملاءك</p>
        </div>

        <div class="row gy-5">
          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
              <div class="img">
              <!-- <img src="{{asset('assets/img/services-1.jpg')}}" class="img-fluid" alt="">-->
                 <img src="{{asset('assets/img/Table QR.png')}}" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="bi bi-activity"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>وداعاً لطوابير الإنتظار</h3>
                </a>
                <p>
                  يمكن لعملائك من خلال إيفكس مسح رمز القائمة على طاولتهم وعرض القائمة و الطلب من خلال الجوال ومعرفة حالة الطلب  
                </p>
              </div>
            </div>
          </div><!-- End Service Item  Drive Thru.png -->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-item">
              <div class="img">
                <img src="{{asset('assets/img/Drive Thru.png')}}" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="bi bi-broadcast"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>طلبات السيارات</h3>
                </a>
                <p>
                  يمكنك وضع رمز qrCode لطلبات السيارة حيث يمكنهم الطلب من خلال جوال دون الحاجة للتحدث مع عامل المطعم أو الكافي و إستلام طلبه عند الوصول للشباك  
                </p>
              </div>
            </div>
          </div><!-- End Service Item Management.png-->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="service-item">
              <div class="img">
                <img src="{{asset('assets/img/Management.png')}}" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="bi bi-easel"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>إدارة المطعم أو الكافي</h3>
                </a>
                <p>
                  يمكن من خلال نظام إيفكس إدارة قائمتك و جميع الفروع و متابعة المبيعات في جميع الفروع في نفس الوقت   
                </p>
              </div>
            </div>
          </div><!-- End Service Item -->

        

        </div>

      </div>
    </section><!-- End Services Section -->
    @else
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Services</h2>
          <p>Ifex offers you services and advantages for you and your clients</p>
        </div>
        <div class="row gy-5">
          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
              <div class="img">
              <!-- <img src="{{asset('assets/img/services-1.jpg')}}" class="img-fluid" alt="">-->
                <img src="{{asset('assets/img/Table QR.png')}}" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="bi bi-activity"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>Goodbye to waiting lines</h3>
                </a>
                <p>
                  Through your order, your customers can scan the menu code on their table, view the menu, order through the mobile phone, and know the status of the order.
                </p>
              </div>
            </div>
          </div><!-- End Service Item  Drive Thru.png -->
          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-item">
              <div class="img">
                <img src="{{asset('assets/img/Drive Thru.png')}}" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="bi bi-broadcast"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>Drive Thru </h3>
                </a>
                <p>
                  You can put a qrCode for car requests so that they can order through a mobile phone without the need to speak with the restaurant or cafe employee and receive their order upon arrival at the counter
                </p>
              </div>
            </div>
          </div><!-- End Service Item Management.png-->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="service-item">
              <div class="img">
                <img src="{{asset('assets/img/Management.png')}}" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="bi bi-easel"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>Restaurant/Cafe management</h3>
                </a>
                <p>
                  You can manage your list and all branches through the Talabaku system, and follow up on sales in all branches at the same time.                </p>
              </div>
            </div>
          </div><!-- End Service Item -->
        </div>
      </div>
    </section><!-- End Services Section -->
    @endif

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

      

      </div>
    </section><!-- End Testimonials Section -->

    @if (session('lang')=='ar')
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-12" data-aos="zoom-in" data-aos-delay="400">
            <div class="pricing-item featured">
              <div class="pricing-header">
                  <h3>مميزات نظام إيفكس</h3>
              </div>
              <ul>
                <li><i class="bi bi-dot"></i> <span>ادخال عدد لا محدود من المنتجات</span></li>
                <li><i class="bi bi-dot"></i> <span>اضافه الفروع (لامحدود)</span></li>
                <li><i class="bi bi-dot"></i> <span>اضافه باركود لكل طاوله والطلب من خلاله (لا محدود)</span></li>
                <li><i class="bi bi-dot"></i> <span>اضافة باركود لطلبات السيارات (سفري) والطلب من خلاله</span></li>
                <li><i class="bi bi-dot"></i> <span>الدفع الالكترونى</span></li>
                <li><i class="bi bi-dot"></i> <span>إدراة الموظفين</span></li>
                <li><i class="bi bi-dot"></i> <span>الحضور والغياب</span></li>
                <li><i class="bi bi-dot"></i> <span>إدارة المخزون</span></li>
                <li><i class="bi bi-dot"></i> <span>إدارة المبيعات والمشتريات</span></li>
              </ul>
            </div>
          </div><!-- End Pricing Item -->
        </div>
      </div>
    </section><!-- End Pricing Section -->
    @else
     <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing" style="direction: ltr">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-12" data-aos="zoom-in" data-aos-delay="400">
            <div class="pricing-item featured">
              <div class="pricing-header">
                <h3>Features of Evix System</h3>
              </div>
              <ul>
                <li><i class="bi bi-dot"></i> <span> Enter an unlimited number of products</span></li>
                <li><i class="bi bi-dot"></i> <span>Add branches (unlimited)</span></li>
                 <li><i class="bi bi-dot"></i> <span>Add a barcode to each table and order through it (unlimited)</span></li>
                 <li><i class="bi bi-dot"></i> <span>Add a barcode to car requests (my travel) and order through it</span></li>
                 <li><i class="bi bi-dot"></i> <span>Online Payment</span></li>
                 <li><i class="bi bi-dot"></i> <span>Staff Management</span></li>
                 <li><i class="bi bi-dot"></i> <span>Attendance and Absence</span></li>
                 <li><i class="bi bi-dot"></i> <span>Inventory management</span></li>
                 <li><i class="bi bi-dot"></i> <span>Sales and Purchasing Management</span></li>
              </ul>
            </div>
          </div><!-- End Pricing Item -->
        </div>
      </div>
    </section><!-- End Pricing Section -->   
    @endif
    
    @if (session('lang') == 'ar')
        <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-header">
          <h2>تواصل معنا</h2>
          <p>نحن بإنتظارك تواصل معنا الأن</p>
        </div>
      </div>

      <div class="container">
        <div class="row gy-5 gx-lg-5">
          <div class="col-lg-4">
            <div class="info">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>العنوان:</h4>
                  <p>الرياض - المملكة العربية السعودية</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>البريد الإلكتروني:</h4>
                  <p>info@waiterq.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>رقم التواصل:</h4>
                  <p>+966583490100</p>
                </div>
              </div><!-- End Info Item -->
            </div>
          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="الإسم" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="البريد الإلكتروني" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="الموضوع" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" placeholder="عنوان الرسالة" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">تحميل</div>
                <div class="error-message"></div>
                <div class="sent-message">تم ارسال الرسالة، شكراً لك</div>
              </div>
              <div class="text-center"><button type="submit">ارسال</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->
    @else
        <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="direction: ltr">
      <div class="container">
        <div class="section-header">
          <h2>Contact us</h2>
          <p>We are waiting for you, contact us now</p>
        </div>
      </div>

      <div class="container">
        <div class="row gy-5 gx-lg-5">
          <div class="col-lg-4">
            <div class="info">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Address:</h4>
                  <p>Riyadh - Saudi Arabia</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>info@waiterq.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Phone:</h4>
                  <p>+966583490100</p>
                </div>
              </div><!-- End Info Item -->
            </div>
          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Write name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Write email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Write subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" placeholder="Write message details" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">The message has been sent, thank you</div>
              </div>
              <div class="text-center"><button type="submit">Send</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->
    @endif

  </main><!-- End #main -->
@endsection