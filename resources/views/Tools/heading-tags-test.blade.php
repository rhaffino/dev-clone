@extends('layouts.app')

@section('content')
<div class="header-blue mt-4 mb-3 px-4 py-1" style="max-width: 1250px; margin: auto;">
    <div class="row d-flex align-items-center">
        <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
            <i id="empty-url" class="bx bxs-shield text-white bx-md mr-3"></i>
            <input type="url" class="form-control lookup-url" name="" value="https://www.example.com" placeholder="https://www.example.com" id="input-url" autocomplete="off">
        </div>
        <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
            <button id="process-button" type="button" class="btn btn-crawl" name="button">Check URL</button>
        </div>
    </div>
</div>

<!-- Bagian untuk menampilkan hasil -->
<div class="result-section" style="max-width: 1250px; margin: auto; background-color: #f9f9f9; padding: 20px;">
    <h4>Result</h4>
    <p style="color: gray; font-size: 12px;">Tested on: 19 Sep 2024 at 10:15</p>
    
    <div class="alert-section" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <span style="background-color: #ffc107; padding: 5px; border-radius: 3px;">Score: 85%</span>
        </div>
        <div style="text-align: right; margin-right: 413px;">
            <span style="background-color: #ffc107; padding: 5px; border-radius: 3px;">Find: 0</span>
            <span style="background-color: #28a745; padding: 5px; border-radius: 3px;">Warning: 1</span>
            <span style="background-color: #dc3545; padding: 5px; border-radius: 3px;">Error: 1</span>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="heading-hierarchy" style="background-color: white; padding: 20px; border: 1px solid #dee2e6; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
                <h5>This page Good Heading Tags</h5>
                <ul class="list-unstyled" style="margin-top: 15px;">
                    <li>
                        <strong style="color: red;">WARNING:</strong> H1 should be 20-70 characters (81 characters) 
                        <span style="background-color: #ffc107; color: white; padding: 2px 5px; border-radius: 3px;">WARNING</span>
                        <a href="#" class="more-link">Tips</a>
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">Title:</span> SEO basics: How to use headings on your site 
                        <span style="color: gray;">(24 characters)</span>
                        <span style="background-color: #17a2b8; color: white; padding: 2px 5px; border-radius: 3px;">INFO</span>
                        <a href="#" class="more-link">More</a>
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">H2:</span> Why use headings? 
                        <span style="color: gray;">(24 characters)</span>
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">H2:</span> Use headings to show text structure 
                        <span style="color: gray;">(24 characters)</span>
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">H3:</span> Use headings to improve SEO 
                        <span style="color: gray;">(24 characters)</span>
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">H3:</span> How to improve the distribution of your headings 
                        <span style="background-color: #17a2b8; color: white; padding: 2px 5px; border-radius: 3px;">INFO</span>
                        <a href="#" class="more-link">More</a>
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">H3:</span> What does the subheading distribution check in Yoast SEO do? 
                        <span style="background-color: #ffc107; color: white; padding: 2px 5px; border-radius: 3px;">CONTENT</span>
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">H3:</span> How to get a green bullet for your heading distribution
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">H3:</span> An example heading structure 
                        <span style="background-color: #ffc107; color: white; padding: 2px 5px; border-radius: 3px;">CONTENT</span>
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">H3:</span> Adding headings 
                        <span style="background-color: #ffc107; color: white; padding: 2px 5px; border-radius: 3px;">WARNING</span>
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">H2:</span> Using your keyphrase in the heading
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">H2:</span> Yoast SEO can help you with the keyphrase in headings assessment
                    </li>
                    <li>
                        <span style="font-weight: bold; color: black;">H3:</span> Choosing whether to use your keyphrase in a subheading
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bagian kanan: Count Heading -->
        <div class="col-lg-4 col-md-4" style="margin-top: -100px;"> <!-- Tambahkan margin-top negatif -->
            <h4>Count Heading</h4>
            <div class="table-responsive">
                <table class="table table-bordered" style="background-color: #f8f9fa;">
                    <thead>
                        <tr>
                            <th>Heading</th>
                            <th>Count</th>
                            <th>Font Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Heading 1</td>
                            <td>1</td>
                            <td>32px</td>
                        </tr>
                        <tr>
                            <td>Heading 2</td>
                            <td>2</td>
                            <td>24px</td>
                        </tr>
                        <tr>
                            <td>Heading 3</td>
                            <td>5</td>
                            <td>18px</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bagian: Your Local History -->
<div id="local-history" class="mt-4 mb-4" style="max-width: 800px; margin-left: 150px; background-color: white; border: 1px solid #dee2e6; border-radius: 5px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
    <div style="display: flex; justify-content: space-between; align-items: center; background-color: #f5f5f5; padding: 10px; border-bottom: 1px solid #dee2e6;">
        <div style="display: flex; align-items: center;">
            <i class="bx bxs-book-bookmark" style="font-size: 20px; margin-right: 10px; color: #333;"></i>
            <h5 style="margin: 0; font-size: 16px; font-weight: 600;">Your Local History</h5>
        </div>
        <a href="#" style="font-size: 14px; text-decoration: none; color: #007bff;">Clear All</a>
    </div>
    <div style="padding: 20px;">
        <p style="color: gray; font-size: 14px; margin: 0;">This is your first impressions, no history yet!</p>
    </div>
</div>

@endsection

@section('styles')
<style>
    body {
        background-color: #f5f5f5;
    }

    .header-blue {
        background-color: #007bff;
        color: white;
        padding: 10px;
        border-radius: 5px;
    }

    .list-unstyled li {
        margin-bottom: 10px;
    }

    .btn-crawl {
        background-color: #28a745;
        color: white;
        border-radius: 5px;
    }

    .result-section {
        background-color: #f9f9f9;
    }

    .heading-hierarchy {
        background-color: white;
        padding: 20px;
        border: 1px solid #dee2e6;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .more-link {
        color: #007bff;
        margin-left: 10px;
    }

    #local-history {
        border-radius: 5px;
        background-color: #f5f5f5;
    }
</style>
@endsection
