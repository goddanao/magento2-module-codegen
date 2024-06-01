{{ include(template_from_string(headerPHP)) }}
namespace {{ vendorName|pascal }}\{{ moduleName|pascal }}\Api\Data;

interface {{ entityName|pascal }}Interface
{
    public const TABLE_NAME = '{{ vendorName|snake }}_{{ moduleName|snake }}_{{ entityName|snake }}';

    public const ENTITY_ID = 'entity_id';
{% for item in fields %}
{% if item.name|lower_only != 'id' %}
    public const {{ item.name|upper }} = '{{ item.name }}';
{% endif %}
{% endfor %}

    /**
     * @return int|null
     */
    public function getId();

    /**
     * @param int $value
     * @return {{ entityName|pascal }}Interface
     */
    public function setId($value): {{ entityName|pascal }}Interface;
{% for item in fields %}
{% if item.name|lower_only != 'id' %}

    /**
     * @return {{ databaseTypeToPHP(item.databaseType) }}|null
     */
    public function get{{ item.name|pascal }}(): ?{{ databaseTypeToPHP(item.databaseType) }};

    /**
     * @param {{ databaseTypeToPHP(item.databaseType) }} $value
     * @return {{ entityName|pascal }}Interface
     */
    public function set{{ item.name|pascal }}({{ databaseTypeToPHP(item.databaseType) }} $value): {{ entityName|pascal }}Interface;
{% endif %}
{% endfor %}
}
