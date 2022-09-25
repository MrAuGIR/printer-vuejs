pimcore.registerNS("pimcore.plugin.SimpleCatalogBundle");

pimcore.plugin.SimpleCatalogBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.SimpleCatalogBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("SimpleCatalogBundle ready!");
    }
});

var SimpleCatalogBundlePlugin = new pimcore.plugin.SimpleCatalogBundle();
