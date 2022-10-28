<style>
    .breadcrumb-item + .breadcrumb-item::before {
        /* float: left;
        padding-right: 0.5rem;
        color: #6c757d; */
        content: "" !important;
    }
    
    .breadcrumb-item + .breadcrumb-item::after {
        float: right;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        color: #6c757d;
        content: "/" ;
    }

    .text-right {
        text-align: left !important;
    }

    .text-left {
        text-align: right !important;
    }

    .float-left {
        float: right !important;
    }

    .float-right {
        float: left !important;
    }

    .float-sm-left {
        float: right !important;
    }

    .float-sm-right {
        float: left !important;
    }

    .card-title {
        float: right;
    }
</style>