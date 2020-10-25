@extends('layouts.main')

@section('body')



dddddd

 {{$url2->url_old}}




<h2 style="color: #707070;"> <p>เรากำลังจะพาคุณไปที่ลิงค์ต้นฉบับ <span id="cz"> ในอีก <span id="counter">5</span> วินาที.</span></p></h2>
    
{{-- 
<script>
async () => {
    if (!window.shorturl) 
    {const poop = await fetch('https://wow.in.th/api.php?url=' + encodeURI(location.href)).then
    (x => x.json());window.shorturl = poop.shorturl ? poop.shorturl : poop.error;}
    console.log(window.shorturl);const elements = {}; 
    elements.container = document.createElement('div');
    elements.container.style.cssText = 'z-index:10000;';
    elements.modal = document.createElement('div');
    elements.modal.style.cssText = 'z-index:10000;position:fixed;box-shadow: 0 5px 15px -5px rgba(0,0,0,0.8);display:inline-block;color:black;padding:24px;background-color:white;bottom:12px;left:12px;border-radius:12px;font-size:18px;transition:all 250ms ease;opacity:0';
    elements.a = document.createElement('a');
    elements.a.innerText = window.shorturl;
    elements.a.href = window.shorturl;
    elements.a.addEventListener('click',(e)=>{e.preventDefault();});
    elements.p = document.createElement('p');
    elements.p.style.cssText = 'padding:0;margin:0;';
    elements.p.innerHTML = `<br>Brought to you by <a href='https://wow.in.th'>ย่อลิงค์</a>`;
    elements.modal.appendChild(elements.a);
    elements.modal.appendChild(elements.p);
    elements.container.appendChild(elements.modal);
    const body = document.querySelector('body');
    body.appendChild(elements.container);
    requestAnimationFrame(()=>{requestAnimationFrame(()=>{elements.modal.style.opacity = 1;})});
    setTimeout(()=>{elements.modal.style.opacity = 0;
    setTimeout(()=>{elements.container.remove();},260);},5000);}()
</script> --}}






@endsection

