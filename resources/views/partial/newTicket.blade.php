 <div class="newTicket">
        <div class="row mb-3">
            <div class="col-md-2">
                <input type="text" class="form-control emsId" name="id[]" id="emsId" placeholder="ID" required>
                    <div class="valid-feedback"></div>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control emsticketNo" id="emsticketNo" name="ticketNo[]" placeholder="Ticket Number" required>
                    <div class="valid-feedback"></div>
            </div>  
            <div class="col-md-3">
                <input type="text" class="form-control emsPrice" name="price[]" placeholder="price" id="price" required>
                    <div class="valid-feedback"></div>
            </div>
            <div class="col-md-2 text-right">
                <button class="btn btn-warning ticketSave">Save</button>
            </div>
            <div class="col-md-2 noD jD">
                <button class="btn btn-danger ticketDelete">Delete</button>
            </div>
        </div>
</div>