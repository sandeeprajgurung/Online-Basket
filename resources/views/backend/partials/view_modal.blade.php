<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
                <label class="checkbox-inline">
                    <input type="checkbox" data-toggle="toggle"> Second
                </label>
              <form role="form" @submit.prevent="updateItem()">
                    
                <div class="box-body">
                    <div class="form-group">
                        <label for="InputName">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Fruit name" :value="this.name" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="Enter ..." :value="this.description"></textarea>
                    </div>
                    <label>Price</label>
                    <div class="input-group">
                        <span class="input-group-addon">NRs.</span>
                        <input type="number" class="form-control" name="price" :value="this.price" required>
                        <span class="input-group-addon">.00</span>
                    </div>
                    <label>Discount</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="discount" :value="this.discount" required>
                        <span class="input-group-addon">%</span>
                    </div>
                    <!-- radio -->
                    {{-- <input type="checkbox" checked data-toggle="toggle"> --}}
                   

            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
