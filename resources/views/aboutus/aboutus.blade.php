@extends('layout.index')<!-- Overview Section -->
@section('content')
        <h1>ABOUT ME</h1>

        <section class="about-section">
            <div class="about-image">
                <img src="Images/IMG_1174.jpg" alt="Creator Image">
            </div>
            <div class="about-text">
                <h2>Hello, I'm <b>Sewanta Luitel</b></h2>
                <p>I am the creator of the <b>Inventory Management System</b>, designed to simplify inventory tracking and enhance business efficiency.</p>
                <p>With a passion for web development and system design, I developed this platform to help businesses manage their inventory seamlessly.</p>
                <p>I am continuously working on improving and expanding this system, integrating modern technologies to provide the best user experience.</p>
            </div>
        </section>

        <section class="contact-section">
            <h2>Contact Me</h2>
            <p>Feel free to reach out for any queries or collaboration opportunities.</p>
            <form id="contact-form">
                <input type="text" id="name" placeholder="Your Name" required>
                <input type="email" id="email" placeholder="Your Email" required>
                <textarea id="message" placeholder="Your Message" required></textarea>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </section>
    </div>
    @endsection()