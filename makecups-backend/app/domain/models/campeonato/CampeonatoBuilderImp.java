package domain.models.campeonato;

import domain.models.Jogador;
import domain.models.Time;
import domain.models.campeonato.exceptions.CampeonatoInvalidoException;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class CampeonatoBuilderImp implements  CampeonatoBuilder {

    @Override
    public CampeonatoDefinitionBuilder nome(String nome) {
        return new CampeonatoDefinitionBuilderImpl(nome);
    }

    public class CampeonatoDefinitionBuilderImpl implements CampeonatoDefinitionBuilder {
        String nome;
        private List<Chave> chaves = new ArrayList<>();
        private List<Time> times = new ArrayList<>();
        private List<Jogador> jogadores = new ArrayList<>();

        public CampeonatoDefinitionBuilderImpl(String nome) {
            this.nome = nome;
        }

        @Override
        public CampeonatoDefinitionBuilder jogadores(Jogador... jogadores) {
            List<Jogador> jogadoresNovos = Arrays.asList(jogadores);
            this.jogadores.addAll(jogadoresNovos);
            return this;
        }

        @Override
        public CampeonatoDefinitionBuilder times(Time... times) {
            List<Time> timesNovos = Arrays.asList(times);
            this.times.addAll(timesNovos);
            return this;
        }

        @Override
        public Campeonato build() throws CampeonatoInvalidoException {
            Campeonato campeonato = new Campeonato(nome, times, jogadores);
            campeonato.getValidator().validate(campeonato);
            return campeonato;
        }
    }
}
