<section class="section" id="reservation">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="reservation-form">
                    <h2 class="form-title"><strong>Faça sua Reserva</strong></h2>
                    <form id="reservation" action="{{route('reservar')}}" method="post">
                        @csrf
                        <div class="row">
                            <input type="text" name="id_usuario" id="id_usuario" hidden value="{{Auth::check() ? Auth::user()->id : ''}}">
                            <div class="col-md-6">
                                <input type="text" id="nome" name="nome" placeholder="Seu Nome" value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" id="email" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" placeholder="Seu Endereço de E-mail" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="telefone" name="telefone" placeholder="Número de Telefone" required>
                            </div>
                            <div class="col-md-6">
                                <select id="numero_pessoas" name="numero_pessoas" required class="form-control">
                                    <option value="" selected disabled>Selecione o número de pessoas</option>
                                    <option value="1">01 Pessoa</option>
                                    <option value="2">02 Pessoas</option>
                                    <option value="3">03 Pessoas</option>
                                    <option value="4">04 Pessoas</option>
                                    <option value="5">05 Pessoas</option>
                                    <option value="6">06 Pessoas</option>
                                    <option value="7">07 Pessoas</option>
                                    <option value="8">08 Pessoas</option>
                                    <option value="9">09 Pessoas</option>
                                    <option value="10">10 Pessoas</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="date" id="date" name="date" required>
                            </div>
                            <div class="col-md-6">
                                <input type="time" id="time" name="time" required>
                            </div>
                            <div class="col-md-12">
                                <textarea id="message" name="message" rows="5" placeholder="Informações Adicionais ou Pedidos Especiais"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="form-submit-button">Fazer uma Reserva</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
