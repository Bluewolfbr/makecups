package ddd.easy.validation;

import ddd.easy.exceptions.InvalidEntityException;

/**
 * A chain validator given a help to build validator that be able
 * to execute a sequence of validations over the entity
 * @param @code{next} a validator that will be call at last.
 */
public abstract class ChainValidator<E> implements Validator<E>{

    private Validator<E> next;

    public ChainValidator(Validator<E> next) {
        this.next = next;
    }

    @Override
    public void validate(E entity) throws InvalidEntityException {
        next.validate(entity);
    }
}
