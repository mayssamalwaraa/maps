<div class="container mt-4">
    <form action="#" method="post"> 
        @csrf
        <div class="row g-3 align-items-center justify-content-center p-4 bg-light rounded shadow-sm">
            
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-geo-alt"></i></span>
                    <input id="address" name="address" type="text" autocomplete="off" 
                           class="form-control" placeholder="حدد العنوان">
                </div>
                <div id="address-list" class="position-absolute w-100" style="z-index: 1000;"></div>
            </div>

            <div class="col-md-4">
                <select class="form-select" name="category">
                    <option value="">حدد التصنيف </option>
                    {{-- @include('includes\category_list') --}}
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search me-1"></i> بحث
                </button>
            </div>
            
        </div>
    </form>
</div>