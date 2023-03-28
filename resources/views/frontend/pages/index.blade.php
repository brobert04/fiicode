@extends('frontend.template')
@section('title', 'HealthHub | Home')
@section('content')
<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="content">
            <h3>Why Choose HealthHub?</h3>
            <p>
                All-in-one solution: HealthHub brings together all aspects of healthcare management, including appointment scheduling, secure messaging, and doctor-patient interaction, into one easy-to-use platform. This means you can manage all of your healthcare needs from everywhere.
            </p>
            <div class="text-center">
              <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-receipt"></i>
                  <h4>Corporis voluptates sit</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Ullamco laboris ladore pan</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-images"></i>
                  <h4>Labore consequatur</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section><!-- End Why Us Section -->

      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container-fluid">

          <div class="row">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
              <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
            </div>

            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
              <h3>All your medical needs, in one place</h3>
              <p>The platform was created to come to the aid of doctors who face patient dissatisfaction caused by too long waiting times. Therefore, here are the main advantages of HealthHUb</p>

              <div class="icon-box">
                <div class="icon"><i class="bx bx-message"></i></div>
                <h4 class="title"><a href="">Instant Communication</a></h4>
                <p class="description">Using the built-in live chat, the patient can instantly get in touch with his doctor</p>
              </div>

              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4 class="title"><a href="">Medical history at the patient's fingertips</a></h4>
                <p class="description">With just a click of a button, the patient can easily see his medical history, without losing time at the medical office</p>
              </div>

              <div class="icon-box">
                <div class="icon"><i class="bx bx-phone"></i></div>
                <h4 class="title"><a href="">Easy to Make Appointment</a></h4>
                <p class="description">Instead of waiting for the doctor to answer your calls, you can send a request yourself</p>
              </div>
                <div class="icon-box">
                    <div class="icon"><i class="bx bx-map"></i></div>
                    <h4 class="title"><a href="">Find the nearest medical offices with ease</a></h4>
                    <p class="description">All medical offices in your area are just a click away</p>
                </div>

            </div>
          </div>

        </div>
      </section><!-- End About Section -->
<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="count-box">
                    <i class="fas fa-user-md"></i>
                    <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Doctors</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                <div class="count-box">
                    <i class="far fa-hospital"></i>
                    <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Departments</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="fas fa-flask"></i>
                    <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Research Labs</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="fas fa-award"></i>
                    <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Awards</p>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- End Counts Section -->
<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="faq-list">
            <ul>
                <li data-aos="fade-up">
                    <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">What is HealthHub? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                        <p>
                            HealthHub is a comprehensive healthcare management platform that helps healthcare providers manage their practice and communicate with their patients more efficiently. Our platform includes features such as appointment scheduling, secure messaging, and online payment, all in one easy-to-use interface.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="100">
                    <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Is HealthHub secure? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Yes, we take your privacy and security very seriously at HealthHub. We have implemented robust security features to keep your information safe, and all communication between patients and healthcare providers is encrypted and secure.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="200">
                    <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Can HealthHub be customized to fit my specific needs?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Yes, HealthHub is designed to be customizable to fit the unique needs of your healthcare practice. Whether you're a solo practitioner or part of a large medical group, our platform can be tailored to suit your specific requirements.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="300">
                    <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">How does HealthHub help improve patient communication? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            HealthHub offers secure messaging features that allow patients to communicate with their healthcare provider in a safe and convenient way. This means that patients can ask questions, request appointments, and receive updates on their health status all through the HealthHub platform. Additionally, our online appointment scheduling feature allows patients to book appointments with ease, which can help improve patient satisfaction and reduce missed appointments.
                        </p>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</section><!-- End Frequently Asked Questions Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
            <div class="container">

            <div class="section-title">
                    <h2>Testimonials</h2>
            </div>
              <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                        <h3>Matthew</h3>
                        <h4>Ceo &amp; Founder</h4>
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            I've been using this app for several months now, and it's made a huge difference in the way I manage my patients. The interface is easy to use, and the features are exactly what I need to stay organized and communicate with my patients more efficiently.
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                          <h3>Andrew</h3>                        <h4>Designer</h4>
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            I highly recommend this app to any medical professional looking for an all-in-one solution for managing their practice. The appointment scheduling and online payment features have made my life so much easier, and my patients love the convenience of being able to communicate with me securely through the app.
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                          <h3>Apie</h3>
                        <h4>Store Owner</h4>
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            As a busy physician with a large patient load, I was looking for a way to streamline my practice and reduce the amount of time I spent on administrative tasks. This app has been a game-changer for me. It's user-friendly and customizable, and the customer support team is top-notch.
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                          <h3>Copperfield</h3>
                        <h4>Freelancer</h4>
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                          Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                          <h3>Musk</h3>
                        <h4>Entrepreneur</h4>
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            I was hesitant to try yet another app for managing my practice, but I'm so glad I gave this one a chance. The secure messaging feature has been especially useful for communicating with patients during the pandemic, and the appointment reminders have reduced the number of no-shows at my office
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
              </div>

            </div>
          </section><!-- End Testimonials Section -->
@endsection
