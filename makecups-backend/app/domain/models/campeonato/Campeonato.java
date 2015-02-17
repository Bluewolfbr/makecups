/*
The MIT License (MIT)

Copyright (c) 2015 Bluewolf Team

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
 */
package domain.models.campeonato;

import ddd.easy.Entity;
import ddd.easy.validation.Validator;
import domain.models.Jogador;
import domain.models.Time;
import domain.models.campeonato.validation.NomeCampeonatoValidator;
import domain.models.campeonato.validation.QuantidadeJogadoresValidator;
import domain.models.campeonato.validation.TamanhoTimeValidatior;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class Campeonato implements Entity{

    private final String nome;
    private final Date criado;
    private Jogador campeao;
    private final List<Chave> chaves;
    private final List<Time> times;
    private final List<Jogador> jogadores;

    protected Campeonato(String nome, List<Time> times, List<Jogador> jogadores) {
        this.nome = nome;
        criado = new Date();
        this.chaves = new ArrayList<>();
        this.times = times;
        this.jogadores = jogadores;
    }

    public String getNome() {
        return nome;
    }

    public Date getCriado() {
        return criado;
    }

    public Jogador getCampeao() {
        return campeao;
    }

    public List<Chave> getChaves() {
        //TODO determinar logica para retornar somente chaves da rodada atual
        return chaves;
    }

    public List<Jogador> getJogadores() {
        return jogadores;
    }

    /**
     *
     * @return
     */
    public Integer sizeTimes() {
       return times.size();
    }

    public Integer sizeJogadores() {
        return jogadores.size();
    }

    @Override
    public Validator getValidator() {
        Validator<Campeonato> nomeValidator = new NomeCampeonatoValidator();
        Validator<Campeonato> tamanhoTimeValidator = new TamanhoTimeValidatior(nomeValidator);
        Validator<Campeonato> quantidadeJogadoresValidator = new QuantidadeJogadoresValidator(tamanhoTimeValidator);
        return quantidadeJogadoresValidator;
    }
}
