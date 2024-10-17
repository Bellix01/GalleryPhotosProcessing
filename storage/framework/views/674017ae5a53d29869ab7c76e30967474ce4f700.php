<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
       
        <style>
            .index-text {
                color: #fdc30c;
                font-family: 'Gagalin', sans-serif;
                font-size: 24px; 
            }

            .photo-text {
                color: #a9816b;
                font-family: 'Gagalin', sans-serif;
                font-size: 24px;
            }

            
            .flex-col {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .text-center {
                text-align: center;
                margin-top: 20px;
                margin-left: 10px; 
            }
        </style>

    </head>
    <body class="antialiased">
        <div class="relative flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-20"> <!-- Changed sm:pt-0 to sm:pt-20 -->
            <?php if(Route::has('login')): ?>
                <div class="fixed top-0 right-0 px-6 py-4 sm:block">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/dashboard')); ?>" class="text-sm text-gray-700 no-underline">Dashboard</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-lg text-gray-700 no-underline">Log in</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="ml-4 text-lg text-gray-700 no-underline">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <svg id="Layer_1" style="enable-background:new 0 0 128 128;" version="1.1" viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="auto"><style type="text/css">
                    .st0{opacity:0.2;fill:#FFFFFF;}
                    .st1{fill:#FFFFFF;}
                    .st2{fill:none;stroke:#242C88;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st3{fill:#5E61A3;}
                    .st4{opacity:0.5;fill:#242C88;}
                    .st5{fill:#39C89A;}
                    .st6{fill:#CAEAFB;}
                    .st7{fill:#589FFF;}
                    .st8{fill:#FF5751;}
                    .st9{fill:#BC8D66;}
                    .st10{opacity:0.7;fill:#FFFFFF;}
                    .st11{fill:#F1C92A;}
                    .st12{opacity:0.4;fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st13{fill:#F3877E;}
                    .st14{fill:#83D689;}
                    .st15{opacity:0.4;fill:#242C88;}
                    .st16{opacity:0.2;fill:#242C88;}
                    
                        .st17{fill:none;stroke:#FFFFFF;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:0.1,6;}
                    .st18{fill:#FFC408;}
                    
                        .st19{opacity:0.4;fill:none;stroke:#FFFFFF;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:0.1,6;}
                    .st20{fill:none;stroke:#CAEAFB;stroke-width:12;stroke-linecap:round;stroke-miterlimit:10;}
                    .st21{fill:none;stroke:#CAEAFB;stroke-width:7;stroke-linecap:round;stroke-miterlimit:10;}
                    .st22{opacity:0.4;fill:none;stroke:#242C88;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st23{opacity:0.5;}
                    .st24{fill:#242C88;}
                    
                        .st25{fill:none;stroke:#242C88;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:0.1,6;}
                    .st26{opacity:0.5;fill:#FFFFFF;}
                    .st27{fill:none;stroke:#FFFFFF;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st28{fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st29{fill:#E5BD9E;}
                    .st30{fill:#A06D47;}
                    
                        .st31{opacity:0.3;fill:none;stroke:#FFFFFF;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:0.1,6;}
                    .st32{opacity:0.1;fill:#242C88;}
                    .st33{opacity:0.5;fill:#FF5751;}
                    .st34{opacity:0.2;fill:none;stroke:#242C88;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st35{opacity:0.3;clip-path:url(#SVGID_2_);}
                    
                        .st36{fill:none;stroke:#FFFFFF;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:0,6;}
                    
                        .st37{opacity:0.3;fill:none;stroke:#FFFFFF;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:0,6;}
                    .st38{clip-path:url(#SVGID_4_);}
                    .st39{opacity:0.2;fill:none;stroke:#242C88;stroke-width:9;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st40{opacity:0.3;}
                    .st41{opacity:0.4;fill:#FFFFFF;}
                    .st42{opacity:0.5;fill:#CAEAFB;}
                    .st43{opacity:0.6;fill:#242C88;}
                    .st44{opacity:0.5;fill:none;stroke:#242C88;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st45{opacity:0.3;fill:#242C88;}
                    .st46{opacity:0.2;}
                    
                        .st47{clip-path:url(#SVGID_6_);fill:none;stroke:#242C88;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st48{opacity:0.2;fill:none;stroke:#FFFFFF;stroke-width:8;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st49{clip-path:url(#SVGID_8_);fill:#FFFFFF;}
                    
                        .st50{clip-path:url(#SVGID_8_);fill:none;stroke:#242C88;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st51{opacity:0.2;clip-path:url(#SVGID_8_);fill:#242C88;}
                    
                        .st52{opacity:0.2;clip-path:url(#SVGID_8_);fill:none;stroke:#242C88;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st53{fill:none;stroke:#242C88;stroke-width:1.848;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st54{opacity:0.4;fill:none;stroke:#FFFFFF;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st55{opacity:0.2;fill:none;stroke:#242C88;stroke-width:7;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st56{opacity:7.000000e-02;fill:#242C88;}
                    .st57{fill:none;stroke:#FFFFFF;stroke-width:4;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st58{opacity:0.4;fill:none;stroke:#FFFFFF;stroke-width:8;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st59{opacity:0.2;fill:none;stroke:#242C88;stroke-width:8;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st60{fill:none;stroke:#FF5751;stroke-width:4;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st61{fill:none;stroke:#242C88;stroke-width:4;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                </style><rect class="st1" height="78.6" transform="matrix(0.9761 0.2175 -0.2175 0.9761 15.4391 -12.3278)" width="101.2" x="13.1" y="24.7"/><rect class="st53" height="78.6" transform="matrix(0.9761 0.2175 -0.2175 0.9761 15.4391 -12.3278)" width="101.2" x="13.1" y="24.7"/><polygon class="st16" points="116,62 116,35.4 38.1,18 22.1,18 5.8,91.3 76.2,107 106,107 "/><polygon class="st1" points="97.2,23 10,23 10,102 111,102 111,36.8 "/><polygon class="st53" points="97.2,23 10,23 10,102 111,102 111,36.8 "/><g><rect class="st7" height="58" width="80" x="20" y="34"/><g><polygon class="st9" points="100.2,92 73.1,44.2 51.2,75.5 40,58.7 20.2,92 39.7,92   "/><circle class="st18" cx="57" cy="52" r="11"/><polygon class="st1" points="40,58.5 31.6,72.6 34.6,78.2 37.9,75.2 43.5,79.9 47,78.2 51,75.2   "/><path class="st1" d="M57.7,66c0,0,4.1,7.2,4.3,6.6c0.2-0.6,6.1-5.6,6.1-5.6l6.9,3.6l1.5-10.3L88.9,72L73.1,44.1L57.7,66z"/><polygon class="st15" points="73.1,44.2 83.6,92 100.2,92   "/><polyline class="st2" points="100.2,91.9 73.1,44.1 39.7,91.9   "/><polyline class="st2" points="51.2,75.4 40,58.5 20.2,91.9   "/><polygon class="st15" points="51.2,75.4 40,58.5 47,81.3   "/><polyline class="st2" points="51.5,91.9 67.1,70.5 80.4,91.9   "/><polygon class="st15" points="72.3,92 67.1,70.7 80.4,92   "/></g><rect class="st53" height="58" width="80" x="20" y="34"/></g><polygon class="st18" points="111,37 97,37 97,23 "/><polygon class="st53" points="111,37 97,37 97,23 "/>
                </svg>
                <div class="text-center">
                    <span class="index-text">INDEX</span><br />
                    <span class="photo-text">PHOTO</span>
                </div>
                </div>
                </div>

              
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\DELL\Downloads\laravel-photo-gallery-main\laravel-photo-gallery-main\resources\views/welcome.blade.php ENDPATH**/ ?>