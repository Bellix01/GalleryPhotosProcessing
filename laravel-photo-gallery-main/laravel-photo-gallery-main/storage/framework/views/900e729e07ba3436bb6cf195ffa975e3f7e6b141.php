<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.plot.ly/plotly-2.27.0.min.js" charset="utf-8"></script>
<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('header', null, []); ?> <a class="text-indigo-500 hover:text-indigo-700 font-semibold" href="<?php echo e(route('album.show', $album->id)); ?>"><?php echo e($album->title); ?> </a> <?php $__env->endSlot(); ?>
    <div class="container mx-auto flex justify-between m-2 p-2 bg-white shadow-md rounded-lg">
        <div class="flex items-center">
           <div style="max-width: 600px; max-height: 550px;"><img id="image" src="<?php echo e($image->getUrl()); ?>" style="max-width: 600px; max-height: 550px;"></div> 
        </div>
        <div class="flex flex-col space-y-14">
            <div class="relative overflow-x-auto">
                <h4>Moments</h4>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" style="min-width: 810px;">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" >
                        <tr>
                            <th scope="col" class="px-6 py-3">Hue mean</th>
                            <th scope="col" class="px-6 py-3">Saturation mean</th>
                            <th scope="col" class="px-6 py-3">Saturation std dev</th>
                            <th scope="col" class="px-6 py-3">Hue skewness </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td id="moment1" class="px-6 py-4"></td>
                            <td id="moment2" class="px-6 py-4"></td>
                            <td id="moment3" class="px-6 py-4"></td>
                            <td id="moment4" class="px-6 py-4"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <h4>Dominant colors</h4>
                <div id="colorsDom" class="flex flex-row space-x-4"></div>
            </div>
            <div>
                <h4>Histogram</h4>
                <div id="myDiv" style=" min-height: 400px;min-width: 600px "></div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>

<script>
    $(document).ready(function (){
        var imageElement = document.getElementById("image");
        var imageUrl = imageElement.getAttribute("src");
        var parts = imageUrl.split("/");
        var path = parts.slice(3).join("/");
        // alert(path);
        var flag=0;
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:5000/process_image", // Flask route for histogram processing
            data: JSON.stringify({ image_path: path }),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (response) {
                var imgData = response.chans;
                var characteristics = response.characteristics;
                var colors = response.colors;
                // Process and display the image data as needed
                moment(characteristics);
                colorsDom(colors);
                console.time('myFunction');
                plotHistograms(imgData);
                console.timeEnd('myFunction');
                console.log(flag);
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
        console.log(flag);
        if(flag== 1){

        }
    });
    function colorsDom(colors){
        var convertedColors = []; var i=0;
        var colorsDom= document.getElementById("colorsDom");
        colors.forEach(function(rgb) {
            i++;
            var hexCode = '#' + rgb.map(component => component.toString(16).padStart(2, '0')).join('');
            var containerDiv= document.createElement("div")
            var colorDiv= document.createElement("div");
            colorDiv.classList.add('ff'+i,'h-10','w-10', 'rounded', 'dark:ring-1', 'dark:ring-inset', 'dark:ring-white/10', 'sm:w-full');
            colorDiv.innerHTML= '<style>.ff'+i+'{ background-color: '+hexCode+';width:49px;}</style>';
            var textDiv= document.createElement("div");
            textDiv.classList.add('text-slate-500', 'text-xs', 'font-mono', 'lowercase', 'dark:text-slate-400', 'sm:text-[0.625rem]', 'md:text-xs', 'lg:text-[0.625rem]', '2xl:text-xs');
            textDiv.innerHTML= hexCode;
            containerDiv.appendChild(colorDiv);
            containerDiv.appendChild(textDiv);
            colorsDom.appendChild(containerDiv);
        });
    }
    function moment(characteristics){
        var moment1= document.getElementById("moment1");
        var moment2= document.getElementById("moment2");
        var moment3= document.getElementById("moment3");
        var moment4= document.getElementById("moment4");
        moment1.innerHTML=characteristics["Hue mean"];
        moment2.innerHTML=characteristics["Saturation mean"];
        moment3.innerHTML=characteristics["Saturation std dev"];
        moment4.innerHTML=characteristics["Hue skewness"];
    }
    function plotHistograms(histogramData) {
        var x = [];
        var y1 = histogramData[0];
        var y2 = histogramData[1];
        var y3 = histogramData[2];
        for (var i = 0; i < 256; i++)
            x.push(i);
        var trace1 = {
            x: x,
            y: y1,
            name: 'Blue', 
            marker: {
                color: "rgb(0, 0, 255)", 
                line: {
                    color:  "rgb(0, 0, 255))", 
                    width: 1
                }
            }, 
            histfunc: "sum", 
            opacity: 0.5, 
            type: "histogram", 
            xbins: {
                end: 256, 
                size: 0.06, 
            }
        };
        var trace2 = {
            x: x,
            y: y2, 
            marker: {
                color: "rgba(100, 200, 102, 0.7)",
                line: {
                    color:  "rgba(100, 200, 102, 1)", 
                    width: 1
                } 
            }, 
            histfunc: "sum",
            name: "Green", 
            opacity: 0.75, 
            type: "histogram", 
            xbins: { 
                end: 256, 
                size: 0.06, 
            }
        };
        var trace3 = {
            x: x,
            y: y3, 
            marker: {
                color: "rgb(255, 0, 0)",
                line: {
                    color:  "rgb(255, 0, 0)", 
                    width: 1
                } 
            }, 
            histfunc: "sum",
            name: "Red", 
            opacity: 0.75, 
            type: "histogram", 
            xbins: { 
                end: 256, 
                size: 0.06, 
            }
        };
        var data = [trace1, trace2,trace3];
        var layout = {
            bargap: 0.05, 
            bargroupgap: 0.2, 
            barmode: "overlay", 
            title: "RGB Histogram", 
            xaxis: {title: "Pixels color"}, 
            yaxis: {title: "Count"}
        };
        var config= {
            modeBarButtonsToRemove: ['pan2d','select2d','lasso2d','resetScale2d','zoomOut2d']};
        Plotly.newPlot('myDiv', data, layout,{displayModeBar: false});
    }
</script><?php /**PATH C:\Users\DELL\Downloads\laravel-photo-gallery-main\laravel-photo-gallery-main\resources\views/albums/image-show.blade.php ENDPATH**/ ?>