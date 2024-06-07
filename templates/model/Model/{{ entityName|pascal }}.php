{{ include(template_from_string(headerPHP)) }}
namespace {{ vendorName|pascal }}\{{ moduleName|pascal }}\Model;

use Magento\Framework\Model\AbstractModel;
use {{ vendorName|pascal }}\{{ moduleName|pascal }}\Api\Data\{{ entityName|pascal }}Interface;
use {{ vendorName|pascal }}\{{ moduleName|pascal }}\Model\ResourceModel\{{ entityName|pascal }} as {{ entityName|pascal }}ResourceModel;

class {{ entityName|pascal }} extends AbstractModel implements {{ entityName|pascal }}Interface
{
    protected $_eventPrefix = '{{ vendorName|snake }}_{{ moduleName|snake }}_{{ entityName|snake }}'; // @phpcs:ignore

    // @phpcs:disable PSR2.Methods.MethodDeclaration.Underscore
    protected function _construct(): void
    {
        $this->_init({{ entityName|pascal }}ResourceModel::class);
    }

    public function getId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    public function setId($value): {{ entityName|pascal }}Interface
    {
        $this->setData(self::ENTITY_ID, $value);

        return $this;
    }
{% for item in fields %}
{% if item.name|lower_only != 'id' %}

    public function get{{ item.name|pascal }}(): ?{{ databaseTypeToPHP(item.databaseType) }}
    {
        return $this->getData(self::{{ item.name|upper }});
    }

    public function set{{ item.name|pascal }}({{ databaseTypeToPHP(item.databaseType) }} $value): {{ entityName|pascal }}Interface
    {
        $this->setData(self::{{ item.name|upper }}, $value);

        return $this;
    }
{% endif %}
{% endfor %}
}
