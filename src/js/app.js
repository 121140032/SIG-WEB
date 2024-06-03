var map = L.map("map").setView([-5.4531, 104.9877], 10);

googleStreets = L.tileLayer("http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}", {
    maxZoom: 20,
    subdomains: ["mt0", "mt1", "mt2", "mt3"],
});

googleStreets.addTo(map);
