@extends("$layout.layouts.layout")
@section('content')
    <div class="dashboardDtlsArea">
        <div class="dashboardDtlsAreainner">
            <div class="paymentDtlsArea">
                <div class="paymentDtlsAreainner">
                    <div class="panel panel-default">
                        <div class="panel-body formPanelBodyArea">
                            <h1
                                class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2">
                                Make A Payment
                                {{ get_currency($countryId) . number_format(total_payable_amount($totalPayableAmount), 2) }}
                            </h1>
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            <form action="{{ route('payment.process') }}" method="POST" id="card-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="card-name"
                                        class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Your
                                        name</label>
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input class="form-control" type="text" name="name" id="card-name"
                                        value="{{ auth()->user()->name }}"
                                        class="border-2 border-gray-200 h-11 px-4 rounded-xl w-full">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email"
                                        class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Email</label>
                                    <input class="form-control" type="email" name="email" id="email"
                                        value="{{ auth()->user()->email }}" readonly
                                        class="border-2 border-gray-200 h-11 px-4 rounded-xl w-full">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="card"
                                        class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Card
                                        details</label>

                                    <div class="bg-gray-100 p-6 rounded-xl">
                                        <div id="card"></div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="w-full formPanelBodyBtn bg-indigo-500 uppercase rounded-xl font-extrabold text-white px-6 h-12">Pay
                                    👉</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let stripe = Stripe('{{ env('STRIPE_KEY') }}')
        const elements = stripe.elements()
        const cardElement = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px'
                }
            }
        })
        const cardForm = document.getElementById('card-form')
        const cardName = document.getElementById('card-name')
        cardElement.mount('#card')
        cardForm.addEventListener('submit', async (e) => {
            e.preventDefault()
            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: cardName.value
                }
            })
            if (error) {
                console.log(error)
            } else {
                let input = document.createElement('input')
                input.setAttribute('type', 'hidden')
                input.setAttribute('name', 'payment_method')
                input.setAttribute('value', paymentMethod.id)
                cardForm.appendChild(input)
                cardForm.submit()
            }
        })
    </script>
@endpush
