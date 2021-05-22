const navigation = responsiveNav("primary-menu", {customToggle: ".nav-toggle"})
		  
window.onload = function() {
    const container = document.getElementById("magicgrid-container")
    if (container !== null) {
        const magicGrid = new MagicGrid({
            container: "#magicgrid-container",
            animate: false,
            gutter: 35,
            maxColumns: 3,
            static: true,
            useMin: true
        })
        magicGrid.listen()
        container.style.opacity = 1
    }
}