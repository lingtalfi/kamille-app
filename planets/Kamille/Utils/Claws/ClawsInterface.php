<?php


namespace Kamille\Utils\Claws;


interface ClawsInterface
{

    /**
     * @param ClawsLayout|string $layout ,
     *                      if it's a string, it's the template and
     *                      the default ClawsLayout instance will be used to hold it.
     * @return $this
     */
    public function setLayout($layout);

    /**
     * @return ClawsLayout
     */
    public function getLayout();


    /**
     * @return ClawsWidget[]
     */
    public function getWidgets();

    /**
     * @param $id , string, the widgetId:
     *
     *                          - widgetId: ( <positionName>. )? <widgetInternalName>
     *
     * See https://github.com/lingtalfi/laws for more info
     * @param $widget
     * @param $position , string: the widget position as defined in doc/claws/widget-position.md
     * @return $this
     */
    public function setWidget($id, ClawsWidget $widget, $position = null);


    public function removeWidget($id);

    public function toArray();

}