
var logos = document.querySelectorAll('.logos > li');
for (var i = 0; i < logos.length; i++) {
    logos[i].addEventListener('click', function(e){
        e.preventDefault();
        this.classList.toggle('hover');
    }, true);
};

if (!("ontouchstart" in document.documentElement)) {
    document.documentElement.className += " no-touch";
}

var tabs = document.querySelectorAll('.filter-controls a');
for (var i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', function(e){
        e.preventDefault();

        var prevEl = document.querySelector('.active'),
            prevBlur = prevEl.innerText || prevEl.textContent,
            currentBlur = this.innerText || this.textContent,
            logos = document.querySelector('.logos');

        // Remove current .active class
        prevEl.classList.remove('active');
        
        // Add .active class to clicked el
        this.classList.toggle('active');

        // Add blur class to logos
        logos.classList.remove('logos--blur'+prevBlur);
        logos.classList.add('logos--blur'+currentBlur);
    }, true);
};



// http://stackoverflow.com/questions/7070054/javascript-shuffle-html-list-element-order
var list = document.querySelector(".logos"),
    button = document.getElementById("h1");
    console.log(list);
function shuffle(items)
{
    var cached = items.slice(0), temp, i = cached.length, rand;
    while(--i)
    {
        rand = Math.floor(i * Math.random());
        temp = cached[rand];
        cached[rand] = cached[i];
        cached[i] = temp;
    }
    return cached;
}
function shuffleNodes()
{
    var nodes = list.children, i = 0;
    nodes = Array.prototype.slice.call(nodes);
    nodes = shuffle(nodes);
    while(i < nodes.length)
    {
        list.appendChild(nodes[i]);
        ++i;
    }
}
button.onclick = shuffleNodes;
