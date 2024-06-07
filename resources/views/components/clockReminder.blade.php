@if(!auth()->user()->clocked_in && auth()->user()->isHired())
    <div id="periodicModal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title">Clock In Reminder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-bottom pb-4">
                    <p style="font-size: 20px">Hello {{ auth()->user()->name }}, Please be reminded, you haven't clocked in</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('clock.index') }}" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go to Clock In</a>
                </div>
            </div>
        </div>
    </div>
@endif
