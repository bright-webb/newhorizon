@extends('layout.app')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <h2 class="big text-center">Leave Addiction Behind, One Reminder at a Time</h2>
        <div class="ui divider"></div>
        <p>
            Unlock Freedom from Addiction at <strong>New Horizon</strong>. Get personalized reminders, expert guidance, and a supportive community on your journey to recovery. Break free from the challenges of addiction as we provide daily motivation, reinforce positive choices, and help you avoid pitfalls. Join us today and discover the strength to transform your life.
        </p>
        <br><br>
        <form class="ui form get-started">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="field">
                <label><strong>Enter your email to get started</strong></label>
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="field">
                <button type="submit" class="ui secondary button" style="width:100%">Get Started</button>
            </div>
        </form>
        <br><br>
        <p><strong class="big">Oh wait, we know you have questions</strong></p>
        <div class="how-it-works">
            <h2>How It Works:</h2>
            <div class="ui bulleted list">
              <div class="item">
                <strong>Sign up:</strong> Create an account on <strong>New Horizons</strong> to access our addiction support platform. It's quick, easy, and completely free.
              </div>
              <div class="item">
                <strong>Personalize Your Profile:</strong> Provide some basic information and customize your profile to tailor your experience. This allows us to deliver personalized reminders and recommendations that best suit your needs.
              </div>
              <div class="item">
                <strong>Choose Your Reminders:</strong> Select the specific addiction-related topics you want to receive reminders on. Whether it's coping strategies, self-care tips, or motivational quotes, we've got you covered.
              </div>
              <div class="item">
                <strong>Daily Reminders:</strong> Sit back and relax as we send you daily reminders to your registered email address. Each reminder is carefully crafted to inspire, encourage, and guide you on your path to recovery.
              </div>
              <div class="item">
                <strong>Expert Guidance:</strong> Benefit from expert guidance and resources available on our platform. We curate valuable articles, videos, and testimonials from addiction recovery professionals to provide you with valuable insights and support.
              </div>
              <div class="item">
                <strong>Engage with the Community:</strong> Connect with others who are on a similar journey. Participate in our community forums, share your experiences, and offer support and encouragement to fellow members.
              </div>
              <div class="item">
                <strong>Track Your Progress:</strong> Monitor your progress using our tracking tools. Keep a record of milestones, achievements, and challenges overcome, celebrating the victories along the way. &mdash; <em>Coming soon!</em>
              </div>
              <div class="item">
                <strong>Ongoing Support:</strong> We're here for you every step of the way. Reach out to our dedicated support team if you have any questions, need additional resources, or require a listening ear.
              </div>
              <div class="item">
                <strong>Stay Inspired:</strong> Receive regular updates on success stories, new resources, and upcoming events to stay motivated and engaged in your recovery journey.
              </div>
            </div>
            <p>
              At <strong>New Horizons</strong>, we're committed to helping you break free from addiction and embrace a life of fulfillment and wellness. Sign up today and let us be your trusted companion on your path to recovery.
            </p>
          </div>


    </div>
</div>
@endsection
