<?php


/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Book\Communication\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @method \Pyz\Zed\Book\Business\BookFacadeInterface getFacade()
 * @method \Pyz\Zed\Book\Communication\BookCommunicationFactory getFactory()
 * @method \Pyz\Zed\Book\Persistence\BookQueryContainerInterface getQueryContainer()
 * @method \Pyz\Zed\Book\BookConfig getConfig()
 * @method \Pyz\Zed\Book\Persistence\BookRepositoryInterface getRepository()
 */
class UpdateBookForm extends BookForm
{
    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addNameField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_NAME, TextType::class, [
            'label' => 'Name',
            'attr' => [
                'readonly' => 'readonly',
            ],
            'constraints' => [
                new NotBlank(),
                new Length(['max' => 255]),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addDescriptionField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_DESCRIPTION, TextareaType::class, [
            'label' => 'Description',
            'required' => false,
            'attr' => [
                'rows' => 10,
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addPublicationDateField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_PUBLICATION_DATE, DateTimeType::class, [
            'label' => 'Publication Date',
            'widget' => 'single_text',
            'required' => false,
            'input' => 'datetime',
            'format' => 'yyyy-MM-dd HH:mm:ss',
        ]);

        return $this;
    }
}
