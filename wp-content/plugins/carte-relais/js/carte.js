var map = document.querySelector('#map')

var paths = map.querySelectorAll('.map-image a')

var links = map.querySelectorAll('.list-map a')

var collectif = document.querySelector('#collectif')

var mytext = collectif.querySelectorAll('.test-tempsco a')

if (NodeList.prototype.forEach === undefined) {

    NodeList.prototype.forEach = function(callback) {

        [].forEach.call(this, callback)
    }

}

var activeArea = function(id) {
    map.querySelectorAll('.is-active').forEach(function(item) {
        item.classList.remove('is-active')
    })
    if (id !== undefined) {
        document.querySelector('#list-' + id).classList.add('is-active')

        document.querySelector('#ville-map-' + id).classList.add('is-active')

        document.querySelector('#tempsco-' + id).classList.add('is-active')
    }



}

paths.forEach(function(path) {

    path.addEventListener('mouseenter', function() {

        var id = this.id.replace('ville-map-', '')
        activeArea(id)

    })
})


links.forEach(function(link) {
    link.addEventListener('mouseenter', function() {
        var id = this.id.replace('list-', '')
        activeArea(id)
    })
})

mytext.forEach(function(link) {
    link.addEventListener('mouseenter', function() {
        var id = this.id.replace('tempsco-', '')
        activeArea(id)
    })
})

map.addEventListener('mouseleave', function() {
    activeArea()
})