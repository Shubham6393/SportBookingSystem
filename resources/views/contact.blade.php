<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <p class="lead">We'd love to hear from you! Fill out the form below and we'll get back to you as soon as possible.</p>
                
                <div class="mt-5">
                    <h4>Our Information</h4>
                    <address class="mt-3">
                        <strong>Sports Leasing Inc.</strong><br>
                        123 Sports Street<br>
                        Athletic City, AC 12345<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                    
                    <address>
                        <strong>Email:</strong><br>
                        <a href="mailto:info@sportsleasing.com">info@sportsleasing.com</a>
                    </address>
                    
                    <h4 class="mt-4">Business Hours</h4>
                    <table class="table table-bordered mt-3">
                        <tbody>
                            <tr>
                                <td>Monday - Friday</td>
                                <td>9:00 AM - 8:00 PM</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td>10:00 AM - 6:00 PM</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td>12:00 PM - 5:00 PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Send us a Message</h3>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 