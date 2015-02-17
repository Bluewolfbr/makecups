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
import domain.models.Jogador;
import domain.models.Liga;
import domain.models.Time;
import domain.models.campeonato.Campeonato;
import domain.models.campeonato.CampeonatoBuilder;
import domain.models.campeonato.CampeonatoBuilderImp;
import domain.models.campeonato.exceptions.CampeonatoInvalidoException;
import org.junit.Rule;
import org.junit.Test;
import org.junit.rules.ExpectedException;

import static org.hamcrest.CoreMatchers.*;
import static org.hamcrest.CoreMatchers.allOf;
import static org.junit.Assert.*;

public class CampeonatoTest {

    @Rule
    public ExpectedException exception = ExpectedException.none();

    /**
     * Testa se a implementacao do builder lança a exceção quando
     * a quantidade de times não segue a restrição
     */
    @Test
    public void testNaoDeixaCampeonatoQuantidadeJogadores() {

        exception.expect(CampeonatoInvalidoException.class);
        exception.expectMessage(equalTo("Quantidade minima de jogadores inválido"));
        CampeonatoBuilder builder = new CampeonatoBuilderImp();
        Campeonato campeonato = builder.nome("Champion Test League").build();
    }

    @Test
    public void testValidaNomeCampeonato() {

        Jogador fulano = new Jogador("Fulano", "");
        Jogador ciclano = new Jogador("Ciclano", "");
        Liga liga = new Liga("Campeonato Brasileiro", "Brasil", "America");

        Time timeA = new Time("Gremio", "GRE", "", liga);
        Time timeB = new Time("Internacional", "INT", "", liga);
        Time timeC = new Time("Sao Paulo", "SPO", "", liga);
        Time timeD = new Time("Flamengo", "FLA", "", liga);

        exception.expect(CampeonatoInvalidoException.class);
        exception.expectMessage("");
        CampeonatoBuilder builder = new CampeonatoBuilderImp();
        Campeonato campeonato = builder.nome("    ").
                jogadores(fulano, ciclano).
                times(timeA, timeB, timeC, timeD).
                build();
    }

    @Test
    public void testNaoDeixaCampeonatoQuantidadeTimes() {

        Jogador fulano = new Jogador("Fulano", "");
        Jogador ciclano = new Jogador("Ciclano", "");

        exception.expect(CampeonatoInvalidoException.class);
        exception.expectMessage(equalTo("Quantidade invalida de times"));
        CampeonatoBuilder builder = new CampeonatoBuilderImp();
        Campeonato campeonato = builder.nome("Champion Test League").
                jogadores(fulano, ciclano).
                build();
    }

    /**
     * Testa se o builder permite criar campeonatos com numero correto de times
     */
    @Test
    public void testQuantidadeTimeCampeonato() {

        Jogador fulano = new Jogador("Fulano", "");
        Jogador ciclano = new Jogador("Ciclano", "");
        Liga liga = new Liga("Campeonato Brasileiro", "Brasil", "America");

        Time timeA = new Time("Gremio", "GRE", "", liga);
        Time timeB = new Time("Internacional", "INT", "", liga);
        Time timeC = new Time("Sao Paulo", "SPO", "", liga);
        Time timeD = new Time("Flamengo", "FLA", "", liga);

        CampeonatoBuilder builder = new CampeonatoBuilderImp();
        Campeonato campeonato = builder.nome("Champion Test League").
                jogadores(fulano, ciclano).
                times(timeA, timeB, timeC, timeD).
                build();
        assertThat(campeonato.sizeTimes(), equalTo(4));
    }

}
