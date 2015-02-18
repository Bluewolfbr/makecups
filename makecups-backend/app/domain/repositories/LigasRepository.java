package domain.repositories;

import ddd.easy.Repository;
import domain.models.Liga;

import java.util.List;

public interface LigasRepository extends Repository<Liga>{


    public Liga consutar(Long id);

    public List<Liga> todos();
}
