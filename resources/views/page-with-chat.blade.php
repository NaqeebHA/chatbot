@extends('layouts.page-with-chat-app')

@section('content')
    <div class="container mt-5">
        <!-- Welcome Section -->
        <div class="row mb-5 text-center">
            <div class="col-md-12">
                <h1 class="display-4">Welcome to DebtHelp AI</h1>
                <p class="lead">Your trusted AI assistant to answer all your debt-related questions instantly.</p>
            </div>
        </div>

        <!-- Chatbot Features Section -->
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="mb-4">Why Use Our Debt Assistance Chatbot?</h2>
            </div>

            <!-- Feature 1: Instant Debt Consultation -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Instant Debt Consultation</h5>
                        <p class="card-text">Ask our chatbot about debt management, loan consolidation, or how to reduce your financial burdens in just a few clicks.</p>
                        <button class="btn btn-warning" onclick="openChat()">Start a Consultation</button>
                    </div>
                </div>
            </div>

            <!-- Feature 2: Debt Repayment Plans -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Debt Repayment Plans</h5>
                        <p class="card-text">Get advice on creating a debt repayment plan that suits your income and financial goals.</p>
                        <button class="btn btn-warning" onclick="openChat()">Get Plan Options</button>
                    </div>
                </div>
            </div>

            <!-- Feature 3: Legal Debt Advice -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Legal Debt Advice</h5>
                        <p class="card-text">Ask legal questions related to debt, such as bankruptcy, collection agencies, or protecting your rights.</p>
                        <button class="btn btn-warning" onclick="openChat()">Get Legal Help</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="row my-5 text-center">
            <div class="col-md-12">
                <h2 class="mb-4">Need Help? Start Chatting Now!</h2>
                <p class="lead">Click the chat icon at the bottom right to get instant help from our AI chatbot about managing your debt.</p>
                <button class="btn btn-warning btn-lg" onclick="openChat()">Ask a Question</button>
            </div>
        </div>

        <!-- Testimonials Section -->
        <div class="row text-center mt-5">
            <div class="col-md-12">
                <h2 class="mb-4">What Our Users Say</h2>
            </div>
            <!-- Testimonial 1 -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <p class="card-text">"The DebtHelp AI helped me figure out how to consolidate my loans. Super easy and fast!"</p>
                        <small>- Sarah M.</small>
                    </div>
                </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <p class="card-text">"I was able to get quick advice on how to protect myself from aggressive collection agencies. Highly recommend it!"</p>
                        <small>- Jason P.</small>
                    </div>
                </div>
            </div>
            <!-- Testimonial 3 -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <p class="card-text">"I got a personalized debt repayment plan in minutes. It's so helpful!"</p>
                        <small>- Linda K.</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="row text-center my-5">
            <div class="col-md-12">
                <h2 class="mb-4">Frequently Asked Questions</h2>
            </div>
            <div class="col-md-6">
                <h5>Can the chatbot help me negotiate with creditors?</h5>
                <p>Yes, the chatbot provides advice on how to approach creditors for a settlement or reduced payments.</p>
            </div>
            <div class="col-md-6">
                <h5>Is the advice legally sound?</h5>
                <p>Our chatbot offers general guidance. For personalized legal advice, consult a professional attorney.</p>
            </div>
            <div class="col-md-6">
                <h5>How do I start using the chatbot?</h5>
                <p>Simply click the chat icon at the bottom right, and you’ll be guided through the process step-by-step.</p>
            </div>
            <div class="col-md-6">
                <h5>Is the chatbot free?</h5>
                <p>Yes, our chatbot is free for basic advice and assistance. For more advanced services, we offer premium plans.</p>
            </div>
        </div>
    </div>
@endsection

