<?php
defined('JPATH_BASE') or die;
class JFormFieldMySelect extends JFormField{
	protected $type = 'MySelect';
    /**
     * @return mixed
     */
    protected function getInput(){
		$db = JFactory::getDbo();
		$layout = JRequest::getVar("layout");
		$sourcetable = $this->element['sourcetable'];
		$fielda = $this->element['fielda'];
		$fieldb = $this->element['fieldb'];
		$fieldc = $this->element['fieldc'];
		$fieldc = $fieldc?$fieldc:$fieldb;
		$related = $this->element['related'];
		$allowroot = (int)(@$this->element['allowroot']);
		$filtersection = $this->element['filtersection'];
		$label = "SELECT_$sourcetable";
		$value = $this->value;
		if(strlen($filtersection)){
 			if($layout=="edit")
			$value = $this->form->getData()->get($filtersection);
			else
			$value = @$this->form->getData()->get("filter")->$filtersection;
			if(strlen($this->element['label']))
			$label = $this->element['label'];
		}
		$W = "";
		if(strlen($related)){
			$W = " WHERE `$related` = ".(int)$value;
		}
		$query = "SELECT `$fielda` AS value, `$fieldb` AS text FROM `#__tourismtour_$sourcetable` $W ORDER BY `$fieldc`";
		$db->setQuery((string) $query);
		  //echo "<P>".$db->replacePrefix( $query )."</P>";
		$O = array();
		if(!$this->multiple)
		$O[] = JHTML::_("select.option", "",  JText::_($label));
		if($allowroot)
		$O[] = JHTML::_("select.option", "0",  JText::_("JGLOBAL_ROOT"));
		$rows = array_merge($O,$db->loadObjectList());
		$attr = $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';
		$attr.= $this->multiple ? ' multiple="multiple"' : '';
		$attr.= $this->element['onchange'] ? ' onchange="'.$this->element['onchange'].'"' : '';
		$attr.= $this->element['class'] ? ' class="'.$this->element['class'].'"' : '';
		$attr.= $this->required ? ' required="required" aria-required="true"' : '';
		$html = JHtml::_('select.genericlist', $rows, $this->name, $attr, 'value', 'text', $this->value , $this->id);
		return $html;
	}
}
?>