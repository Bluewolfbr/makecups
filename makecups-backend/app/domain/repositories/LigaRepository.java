package domain.repositories;

import ddd.easy.Builder;
import ddd.easy.Factory;
import ddd.easy.Repository;
import domain.models.Liga;
import domain.models.campeonato.CampeonatoBuilder;

import java.util.List;

public interface LigaRepository extends Repository<Liga>{

    public Long insert(Liga liga);

    public Liga consutar(Long id);

    public List<Liga> todos();

    public LigaBuilder build(String nome, String pais, String regiao);

    public interface LigaBuilder extends Builder<Liga>{
            public Liga build();
    }
}
