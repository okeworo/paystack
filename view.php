<div>
    <div class="flex justify-center items-center">
        <button type="button" class="emerald-green hover:emerald-green text-white font-bold py-2 px-4 rounded" wire:click="showDepositModal">
            Get Started!
        </button>
        
        <!-- Modal -->
        <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center" style="display:{{ $showModal ? 'block' : 'none' }}">

            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto" style="display:{{ $showModal ? 'block' : 'none' }}">
                
                <div class="modal-content py-4 text-left px-6">

                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold">Add Funds to Wallet</p>
                        <button class="modal-close cursor-pointer z-50" wire:click="hideDepositModal">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M1.5 1.5l15 15m0-15L1.5 16.5"></path>
                            </svg>
                        </button>
                    </div>

                    <form wire:submit.prevent="makeDeposit">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="deposit-amount">
                                Amount
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="deposit-amount" type="number" placeholder="Enter Amount" wire:model.defer="amount">
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                Submit
                            </button>
                            <button type="button" class="modal-close bg-gray-500 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded" wire:click="hideDepositModal">
                            Close
                        </button>
                        </div>
                    </form>
                </div>

            </div>
        </div> 
    </div>
    <!-- Move the modal-overlay inside the modal-container -->
    <!-- <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" wire:click="hideDepositModal"></div> -->
</div>
